<?php

namespace App\Livewire;

use App\Models\Portfolio;
use Livewire\Component;

class ProjectFilter extends Component
{
    public $selectedTechnology = 'all';
    public $selectedCategory = 'all';
    public $searchTerm = '';
    public $mode = 'client';

    public function mount()
    {
        $this->mode = session('preferred_mode', 'client');
    }

    public function updatedSearchTerm()
    {
        // Track search interactions
        if (!empty($this->searchTerm)) {
            \App\Models\PageInteraction::create([
                'session_id' => session()->getId(),
                'event_type' => 'project_search',
                'metadata' => [
                    'search_term' => $this->searchTerm,
                ],
            ]);
        }
    }

    public function render()
    {
        $query = Portfolio::query();

        // Filter by technology
        if ($this->selectedTechnology !== 'all') {
            $query->whereJsonContains('technologies', $this->selectedTechnology);
        }

        // Filter by category (if needed in future)
        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

        // Search by title or description
        if (!empty($this->searchTerm)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            });
        }

        $portfolios = $query->orderBy('is_featured', 'desc')
            ->orderBy('sort_order')
            ->get();

        // Get all unique technologies from all portfolios
        $allTechnologies = Portfolio::all()
            ->pluck('technologies')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        return view('livewire.project-filter', [
            'portfolios' => $portfolios,
            'technologies' => $allTechnologies,
        ]);
    }
}
