<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'progress',
        'technologies',
        'category',
        'started_at',
        'completed_at',
        'deadline',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'started_at' => 'date',
        'completed_at' => 'date',
        'deadline' => 'date',
    ];

    /**
     * Scope for filtering by status
     */
    public function scopeBacklog($query)
    {
        return $query->where('status', 'backlog');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeShipped($query)
    {
        return $query->where('status', 'shipped');
    }

    /**
     * Get time remaining until deadline
     */
    public function getDaysRemainingAttribute()
    {
        if (!$this->deadline) {
            return null;
        }

        return now()->diffInDays($this->deadline, false);
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'backlog' => 'gray',
            'in_progress' => 'blue',
            'shipped' => 'green',
            default => 'gray',
        };
    }
}
