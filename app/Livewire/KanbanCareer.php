<?php

namespace App\Livewire;

use App\Models\Career;
use Livewire\Component;
use Livewire\Attributes\On;

class KanbanCareer extends Component
{
    public $mode = 'client';
    public $selectedCard = null;
    public $showModal = false;

    #[On('modeChanged')]
    public function updateMode($mode)
    {
        $this->mode = $mode;
    }

    public function viewCard($cardId)
    {
        $this->selectedCard = Career::find($cardId);
        $this->showModal = true;
        
        // Track interaction
        \App\Models\PageInteraction::create([
            'session_id' => session()->getId(),
            'event_type' => 'card_click',
            'metadata' => [
                'card_id' => $cardId,
                'card_title' => $this->selectedCard->title,
            ],
        ]);
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedCard = null;
    }

    public function render()
    {
        $careers = [
            'backlog' => Career::backlog()->orderBy('sort_order')->get(),
            'in_progress' => Career::inProgress()->orderBy('sort_order')->get(),
            'shipped' => Career::shipped()->orderBy('sort_order')->get(),
        ];

        return view('livewire.kanban-career', [
            'careers' => $careers,
        ]);
    }
}
