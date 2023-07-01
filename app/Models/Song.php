<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Song extends Model
{
    protected $table = 'songs';
    use HasFactory;

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function lyrics(): HasMany
    {
        return $this->hasMany(Lyrics::class);
    }
}
