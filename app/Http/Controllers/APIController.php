<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LyricsResource;

class APIController extends Controller
{
    public function returnRandomLyric() {
        $lyricsTest = (object)[
            'id'           => 1,
            'lyrics'       => "You're solid gold, I'll see you in hell",
            'relatedAlbum' => 'Queens Of The Stone Age',
        ];
        return response()->json(new LyricsResource($lyricsTest));
    }
}
