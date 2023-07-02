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
    #[ArrayShape(['id' => "int", 'songName' => "string", 'relatedAlbum' => "mixed"])]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'songName' => $this->name,
            'relatedAlbum' => $this->album,
        ];
    }
}
