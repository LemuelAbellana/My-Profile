<?php

namespace App\Livewire;

use App\Models\Portfolio;
use Livewire\Component;
use Livewire\Attributes\On;

class PortfolioGrid extends Component
{
    public $mode = 'client';
    public $selectedProject = null;
    public $showModal = false;

    #[On('modeChanged')]
    public function updateMode($mode)
    {
        $this->mode = $mode;
    }

    public function viewProject($projectId)
    {
        $this->selectedProject = Portfolio::find($projectId);
        $this->showModal = true;
        
        // Track interaction
        \App\Models\PageInteraction::create([
            'session_id' => session()->getId(),
            'event_type' => 'project_view',
            'metadata' => [
                'project_id' => $projectId,
                'project_title' => $this->selectedProject->title,
            ],
        ]);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedProject = null;
    }

    public function render()
    {
        $portfolios = Portfolio::orderBy('is_featured', 'desc')
            ->orderBy('sort_order')
            ->get();

        return view('livewire.portfolio-grid', [
            'portfolios' => $portfolios,
        ]);
    }
}
