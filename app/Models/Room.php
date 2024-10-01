<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cinema_id',
        'cinema_class_id',
        'name',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }
    public function roombooks(): HasMany
    {
        return $this->hasMany(RoomBook::class);
    }
    public function cinema(): BelongsTo
    {
        return $this->belongsTo(Cinema::class);
    }
    public function cinemaClass(): BelongsTo
    {
        return $this->belongsTo(CinemaClass::class);
    }
}
