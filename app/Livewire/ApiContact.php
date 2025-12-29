<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketSubmitted;

class ApiContact extends Component
{
    public $email = '';
    public $name = '';
    public $message = '';
    public $priority = 'medium';
    
    public $tests = [
        'email_format' => 'pending',
        'email_dns' => 'pending',
        'name_length' => 'pending',
        'message_length' => 'pending',
    ];
    
    public $response = null;
    public $statusCode = null;

    public function updatedEmail()
    {
        // Test 1: Email Format Validation
        $this->tests['email_format'] = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'pass' : 'fail';
        
        // Test 2: DNS Check (Expert Level)
        if ($this->tests['email_format'] === 'pass') {
            $domain = substr(strrchr($this->email, "@"), 1);
            $this->tests['email_dns'] = checkdnsrr($domain, 'MX') ? 'pass' : 'fail';
        } else {
            $this->tests['email_dns'] = 'pending';
        }
    }
    
    public function updatedName()
    {
        // Test 3: Name Length
        $length = strlen(trim($this->name));
        $this->tests['name_length'] = ($length >= 2 && $length <= 100) ? 'pass' : 'fail';
    }
    
    public function updatedMessage()
    {
        // Test 4: Message Length
        $length = strlen(trim($this->message));
        $this->tests['message_length'] = ($length >= 10 && $length <= 5000) ? 'pass' : 'fail';
    }

    public function submit()
    {
        // Run all validations
        $this->updatedEmail();
        $this->updatedName();
        $this->updatedMessage();
        
        // Check if all tests pass
        $allTestsPass = !in_array('fail', $this->tests) && !in_array('pending', $this->tests);
        
        if (!$allTestsPass) {
            $this->statusCode = 422;
            $this->response = [
                'status' => 'error',
                'code' => 422,
                'message' => 'Validation failed',
                'errors' => array_filter($this->tests, fn($test) => $test === 'fail'),
                'timestamp' => now()->toIso8601String(),
            ];
            return;
        }
        
        try {
            // Create ticket
            $ticket = Ticket::create([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => 'Contact Request - ' . ucfirst($this->priority) . ' Priority',
                'message' => $this->message,
                'status' => 'open',
                'priority' => $this->priority,
            ]);
            
            // Send email
            Mail::to(config('mail.from.address'))->send(new TicketSubmitted($ticket));
            
            // Success response
            $this->statusCode = 200;
            $this->response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Message sent successfully',
                'data' => [
                    'ticket_id' => $ticket->id,
                    'reference' => 'TICKET-' . str_pad($ticket->id, 6, '0', STR_PAD_LEFT),
                    'estimated_response' => '24-48 hours',
                ],
                'timestamp' => now()->toIso8601String(),
            ];
            
            // Reset form after 3 seconds
            $this->dispatch('reset-form-delay');
            
        } catch (\Exception $e) {
            $this->statusCode = 500;
            $this->response = [
                'status' => 'error',
                'code' => 500,
                'message' => 'Internal server error',
                'debug' => config('app.debug') ? $e->getMessage() : null,
                'timestamp' => now()->toIso8601String(),
            ];
        }
    }
    
    public function resetForm()
    {
        $this->reset(['email', 'name', 'message', 'priority', 'response', 'statusCode']);
        $this->tests = [
            'email_format' => 'pending',
            'email_dns' => 'pending',
            'name_length' => 'pending',
            'message_length' => 'pending',
        ];
    }

    public function render()
    {
        return view('livewire.api-contact');
    }
}
