<?php

namespace App\Livewire;

use App\Models\Ticket;
use App\Mail\TicketSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class SupportTicket extends Component
{
    public $mode = 'client';
    
    #[Validate('required|min:2|max:255')]
    public $requester_name = '';
    
    #[Validate('required|email')]
    public $requester_email = '';
    
    #[Validate('required|in:low,medium,high,critical')]
    public $severity = 'low';
    
    #[Validate('nullable|in:startup,agency,enterprise')]
    public $environment = '';
    
    #[Validate('required|min:10')]
    public $description = '';
    
    // Honeypot fields
    public $website = '';
    public $timestamp = '';
    
    public $submitted = false;
    public $ticketNumber = '';

    public function mount()
    {
        $this->timestamp = now()->timestamp;
    }

    #[On('modeChanged')]
    public function updateMode($mode)
    {
        $this->mode = $mode;
    }

    public function submitTicket()
    {
        // Honeypot check
        if ($this->website !== '') {
            return; // Bot detected
        }
        
        // Time check (must take at least 3 seconds to fill form)
        if (now()->timestamp - $this->timestamp < 3) {
            $this->addError('general', 'Please take your time filling out the form.');
            return;
        }

        // Rate limiting
        $key = 'contact-form:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $this->addError('general', 'Too many requests. Please try again later.');
            return;
        }

        $this->validate();

        RateLimiter::hit($key, 60); // 1 minute cooldown

        // Create ticket
        $ticket = Ticket::create([
            'requester_name' => $this->requester_name,
            'requester_email' => $this->requester_email,
            'severity' => $this->severity,
            'environment' => $this->environment,
            'description' => $this->description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Send email notification
        $this->sendNotification($ticket);

        // Track submission
        \App\Models\PageInteraction::create([
            'session_id' => session()->getId(),
            'event_type' => 'ticket_submit',
            'metadata' => [
                'ticket_id' => $ticket->id,
                'severity' => $ticket->severity,
            ],
        ]);

        $this->ticketNumber = $ticket->ticket_number;
        $this->submitted = true;
        $this->reset(['requester_name', 'requester_email', 'severity', 'environment', 'description']);
    }

    protected function sendNotification($ticket)
    {
        try {
            Mail::to(config('mail.from.address'))
                ->send(new TicketSubmitted($ticket));

            // If critical, send Discord notification if configured
            if ($ticket->isCritical() && config('services.discord.webhook')) {
                $this->sendDiscordNotification($ticket);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to send ticket notification: ' . $e->getMessage());
        }
    }

    protected function sendDiscordNotification($ticket)
    {
        // Implement Discord webhook if needed
    }

    public function render()
    {
        return view('livewire.support-ticket');
    }
}
