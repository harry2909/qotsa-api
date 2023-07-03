<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['id' => "mixed", 'albumName' => "mixed", 'metadata' => "array"])]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'albumName' => $this->name,
            'metadata' => [
                'release_date' => $this->release_date,
                'run_time' => $this->run_time,
                'spotify_url' => $this->spotify_url,
                'relatedSongs' => $this->songs,
            ]
        ];
    }
}
