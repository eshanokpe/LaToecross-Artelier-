<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'artwork_id',
        'name',
        'email',
        'phone',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Get the artwork that owns the enquiry.
     */
    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    /**
     * Mark the enquiry as read.
     */
    public function markAsRead(): void
    {
        $this->update(['is_read' => true]);
    }

    /**
     * Scope a query to only include unread enquiries.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope a query to only include read enquiries.
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }
}