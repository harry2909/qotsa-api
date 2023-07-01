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
    #[ArrayShape(['id' => "int", 'lyrics' => "string", 'relatedSong' => "int"])]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'lyrics' => $this->lyrics,
            'relatedSong' => $this->song_id
        ];
    }
}
