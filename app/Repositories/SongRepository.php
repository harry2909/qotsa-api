<?php

namespace App\Repositories;

use App\Interfaces\SongInterface;
use App\Models\Song;

class SongRepository implements SongInterface
{
    private Song $model;

    public function __construct(Song $song)
    {
        $this->model = $song;
    }
    public function getRandomSong()
    {
        return $this->model->first();
    }
}
