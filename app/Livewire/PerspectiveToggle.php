<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class PerspectiveToggle extends Component
{
    public $mode = 'client'; // 'client' or 'dev'
    
    public function mount()
    {
        // Load user's preferred mode from session
        $this->mode = session('preferred_mode', 'client');
    }

    public function toggleMode()
    {
        $this->mode = $this->mode === 'client' ? 'dev' : 'client';
        
        // Save preference to session
        session(['preferred_mode' => $this->mode]);
        
        // Dispatch event to update all components
        $this->dispatch('modeChanged', mode: $this->mode);
        
        // Track interaction
        $this->trackInteraction();
    }

    protected function trackInteraction()
    {
        \App\Models\PageInteraction::create([
            'session_id' => session()->getId(),
            'event_type' => 'mode_toggle',
            'metadata' => [
                'new_mode' => $this->mode,
                'timestamp' => now()->toISOString(),
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.perspective-toggle');
    }
}
