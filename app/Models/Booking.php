<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'seat_id',
        'room_book_id',
        'user_id',
        'code',
        'movie_id',
        'date',
        'is_customer',
        'status',
        'tax',
        'discount',
        'total_price',
    ];

    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }
    public function roomBook(): BelongsTo
    {
        return $this->belongsTo(RoomBook::class);
    }
}
