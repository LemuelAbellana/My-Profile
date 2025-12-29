<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'url',
        'github_url',
        'tests_passing',
        'critical_bugs',
        'minor_bugs',
        'performance_score',
        'technologies',
        'challenge',
        'solution',
        'results',
        'completed_at',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'tests_passing' => 'boolean',
        'is_featured' => 'boolean',
        'completed_at' => 'date',
    ];

    /**
     * Get overall health status
     */
    public function getHealthStatusAttribute()
    {
        if ($this->critical_bugs > 0) {
            return 'critical';
        }

        if ($this->minor_bugs > 3 || $this->performance_score < 70) {
            return 'warning';
        }

        if ($this->tests_passing && $this->performance_score >= 90) {
            return 'excellent';
        }

        return 'good';
    }

    /**
     * Get health status color
     */
    public function getHealthColorAttribute()
    {
        return match($this->health_status) {
            'excellent' => 'green',
            'good' => 'blue',
            'warning' => 'yellow',
            'critical' => 'red',
            default => 'gray',
        };
    }

    /**
     * Get build status
     */
    public function getBuildStatusAttribute()
    {
        return $this->tests_passing ? 'passing' : 'failing';
    }

    /**
     * Scope for featured projects
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
