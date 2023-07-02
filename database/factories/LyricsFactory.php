<?php

namespace Database\Factories;

use App\Models\Lyrics;
use Illuminate\Database\Eloquent\Factories\Factory;

class LyricsFactory extends Factory
{
    protected $model = Lyrics::class;

    public function definition()
    {
        return [
            'lyrics' => 'Lyric line',
        ];
    }
}
