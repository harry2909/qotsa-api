<?php

namespace App\Services;

use App\Interfaces\AlbumInterface;
use App\Models\Album;

class AlbumService
{
    protected AlbumInterface $albumRepository;

    public function __construct(AlbumInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function getRandomAlbum(): Album
    {
        return $this->albumRepository->getRandomAlbum();
    }
}
