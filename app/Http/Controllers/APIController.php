<?php

namespace App\Http\Controllers;

use App\Http\Resources\LyricsResource;
use App\Services\LyricsService;
use Illuminate\Http\JsonResponse;

class APIController extends Controller
{
    protected LyricsService $lyricsService;

    public function __construct(LyricsService $lyricsService) {
        $this->lyricsService = $lyricsService;
    }

    public function returnRandomLyric(): JsonResponse
    {
        $randomLyrics = $this->lyricsService->getRandomLyrics();
        return response()->json(new LyricsResource($randomLyrics));
    }
}
