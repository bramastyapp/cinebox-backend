<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSession extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "start_time",
        "end_time",
    ];

    public function roomBooks(): HasMany
    {
        return $this->hasMany(RoomBook::class);
    }
}
