<?php

namespace App\Services;

use App\Interfaces\SongInterface;
use App\Models\Song;

class SongService
{
    protected SongInterface $songRepository;

    public function __construct(SongInterface $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    public function getRandomSong(): Song
    {
        return $this->songRepository->getRandomSong();
    }
}
