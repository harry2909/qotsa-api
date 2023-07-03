<?php

namespace App\Http\Controllers;

use App\Http\Resources\LyricsResource;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\SongResource;
use App\Services\LyricsService;
use App\Services\AlbumService;
use App\Services\SongService;
use Illuminate\Http\JsonResponse;

class APIController extends Controller
{
    protected LyricsService $lyricsService;
    protected AlbumService $albumService;
    protected SongService $songService;

    public function __construct(
        LyricsService $lyricsService,
        AlbumService  $albumService,
        SongService   $songService
    )
    {
        $this->lyricsService = $lyricsService;
        $this->albumService = $albumService;
        $this->songService = $songService;
    }

    public function returnRandomLyric(): JsonResponse
    {
        $randomLyrics = $this->lyricsService->getRandomLyrics();
        return response()->json(new LyricsResource($randomLyrics));
    }

    public function returnRandomAlbum(): JsonResponse
    {
        $randomAlbum = $this->albumService->getRandomAlbum();
        return response()->json(new AlbumResource($randomAlbum));
    }

    public function returnRandomSong(): JsonResponse
    {
        $randomSong = $this->songService->getRandomSong();
        return response()->json(new SongResource($randomSong));
    }
}
