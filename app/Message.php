<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'message', 'isActive', 'type'
    ];

    /**
     * Scope a query to only include active message.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('isActive', 1);
    }

    /**
     * Scope a query to only include welcome message.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWelcomeMessage($query)
    {
        return $query->where('type', '=', 'welcome');
    }

    /**
     * Scope a query to only include preface message.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePrefaceMessage($query)
    {
        return $query->where('type', '=', 'preface');
    }
}
