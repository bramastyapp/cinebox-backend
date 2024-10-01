<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'room_id',
        'time_session_id',
        'day',
        'price',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function timeSessions(): HasMany
    {
        return $this->hasMany(TimeSession::class);
    }
}
