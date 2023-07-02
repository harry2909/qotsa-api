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
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed --class=AlbumSongLyricsSeeder');
    }

    /** @test */
    public function lyrics_endpoint_returns_200(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/lyrics/');
        $response->assertStatus(200);
    }

    /** @test */
    public function song_endpoint_returns_200(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/song/');
        $response->assertStatus(200);
    }

    /** @test */
    public function album_endpoint_returns_200(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/album/');
        $response->assertStatus(200);
    }

    /** @test */
    public function lyrics_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/lyrics/');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'lyrics',
                'relatedSong',
                'relatedAlbum',
            ]);
    }

    /** @test */
    public function song_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/song/');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'songName',
                'relatedAlbum',
            ]);
    }

    /** @test */
    public function album_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/album/');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'albumName',
            ]);
    }
}
