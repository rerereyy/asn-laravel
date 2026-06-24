<?php

namespace App\Models;

use Database\Factories\CampaignFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'cover_image',
        'target_amount',
        'current_amount',
        'donor_count',
        'category',
        'status',
        'deadline_at',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'deadline_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getExcerptAttribute(): string
    {
        return str()->limit($this->description, 120);
    }

    public function getProgressPercentAttribute(): float
    {
        return $this->target_amount > 0
            ? min(100, round(($this->current_amount / $this->target_amount) * 100, 2))
            : 0;
    }

    protected static function newFactory(): CampaignFactory
    {
        return CampaignFactory::new();
    }
}
