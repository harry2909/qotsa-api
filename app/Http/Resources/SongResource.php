<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['id' => "mixed", 'songName' => "mixed", 'metadata' => "array"])]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'songName' => $this->name,
            'metadata' => [
                'run_time' => $this->run_time,
                'spotify_url' => $this->spotify_url,
                'relatedAlbum' => $this->album,
            ]
        ];
    }
}
