<?php

namespace App\Repositories;

use App\Interfaces\AlbumInterface;
use App\Models\Album;

class AlbumRepository implements AlbumInterface
{
    private Album $model;

    public function __construct(Album $album)
    {
        $this->model = $album;
    }
    public function getRandomAlbum()
    {
        return $this->model->first();
    }
}
