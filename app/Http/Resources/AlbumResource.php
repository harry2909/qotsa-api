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
    #[ArrayShape(['id' => "int", 'albumName' => "string"])]
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'albumName' => $this->name,
        ];
    }
}
