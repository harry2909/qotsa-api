<?php

namespace App\Services;

use App\Interfaces\LyricsInterface;
use App\Models\Lyrics;

class LyricsService
{
    protected LyricsInterface $lyricsRepository;

    public function __construct(LyricsInterface $lyricsRepository)
    {
        $this->lyricsRepository = $lyricsRepository;
    }

    public function getRandomLyrics(): Lyrics
    {
        return $this->lyricsRepository->getRandomLyrics();
    }
}
