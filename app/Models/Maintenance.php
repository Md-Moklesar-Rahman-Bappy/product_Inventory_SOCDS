<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maintenance extends Model
{
    protected $fillable = [
        'product_id',
        'description',
        'performed_at',
        'start_time',
        'end_time',
        'user_id',
    ];

    protected $casts = [
        'performed_at' => 'datetime',
        'start_time'   => 'datetime',
        'end_time'     => 'datetime',
        'description'  => 'string',
    ];

    /**
     * Relationships
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors
     */
    public function getPerformedAtFormattedAttribute(): string
    {
        return $this->performed_at ? $this->performed_at->format('d M Y, h:i A') : '—';
    }

    public function getUserNameAttribute(): string
    {
        return $this->user ? $this->user->name : 'Unknown';
    }
}
