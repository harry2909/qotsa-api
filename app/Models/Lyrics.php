<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lyrics extends Model
{
    use HasFactory;

    protected $table = 'lyrics';

    protected $fillable = [
        'lyrics',
        'album_id',
    ];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }
}
