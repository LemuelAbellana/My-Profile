<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'requester_name',
        'requester_email',
        'severity',
        'environment',
        'description',
        'status',
        'resolved_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    /**
     * Boot method to auto-generate ticket number
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_number = self::generateTicketNumber();
        });
    }

    /**
     * Generate unique ticket number
     */
    public static function generateTicketNumber()
    {
        $date = now()->format('Ymd');
        $count = self::whereDate('created_at', today())->count() + 1;
        
        return sprintf('TKT-%s-%03d', $date, $count);
    }

    /**
     * Get severity priority order
     */
    public function getSeverityPriorityAttribute()
    {
        return match($this->severity) {
            'critical' => 1,
            'high' => 2,
            'medium' => 3,
            'low' => 4,
            default => 5,
        };
    }

    /**
     * Get severity color
     */
    public function getSeverityColorAttribute()
    {
        return match($this->severity) {
            'critical' => 'red',
            'high' => 'orange',
            'medium' => 'yellow',
            'low' => 'green',
            default => 'gray',
        };
    }

    /**
     * Check if ticket is critical
     */
    public function isCritical()
    {
        return $this->severity === 'critical';
    }
}
