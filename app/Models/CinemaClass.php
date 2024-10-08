<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CinemaClass extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'priority',
        'name',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
