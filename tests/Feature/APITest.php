<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class APITest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        // run the migrations
        $this->artisan('migrate:fresh');

        // seed the database
        $this->artisan('db:seed --class=AlbumSongLyricsSeeder');
        // or you can call
        // $this->seed();
    }

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
                'relatedSong',
            ]);
    }
}
