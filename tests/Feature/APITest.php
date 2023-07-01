<?php

namespace Tests\Feature;

use Tests\TestCase;

class APITest extends TestCase
{
    /** @test */
    public function api_endpoint_returns_data(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/lyrics/');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/lyrics/');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'lyrics',
                'relatedAlbum',
            ]);
    }
}
