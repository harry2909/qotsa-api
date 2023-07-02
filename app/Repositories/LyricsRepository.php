<?php

namespace App\Repositories;

use App\Interfaces\LyricsInterface;
use App\Models\Lyrics;

class LyricsRepository implements LyricsInterface
{
    private Lyrics $model;

    public function __construct(Lyrics $lyrics)
    {
        $this->model = $lyrics;
    }
    public function getRandomLyrics()
    {
        return $this->model->first();
    }
}
