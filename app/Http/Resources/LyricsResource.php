<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class LyricsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['id' => "mixed", 'lyrics' => "mixed", 'metadata' => "array"])]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'lyrics' => $this->lyrics,
            'metadata' => [
                'relatedSong' => $this->song,
                'relatedAlbum' => $this->song->album,
            ]
        ];
    }
}
