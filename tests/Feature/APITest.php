<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class APITest extends TestCase
{

    use DatabaseMigrations;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed --class=AlbumSongLyricsSeeder');
        $this->user = User::factory()->create();
    }

    /** @test */
    public function lyrics_endpoint_returns_200(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/api/lyrics/');
        $response->assertStatus(200);
    }

    /** @test */
    public function song_endpoint_returns_200(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/api/song/');
        $response->assertStatus(200);
    }

    /** @test */
    public function album_endpoint_returns_200(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/api/album/');
        $response->assertStatus(200);
    }

    /** @test */
    public function lyrics_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/api/lyrics/');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'lyrics',
                'metadata',
            ]);
    }

    /** @test */
    public function song_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/api/song/');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'songName',
                'metadata'
            ]);
    }

    /** @test */
    public function album_endpoint_returns_data_with_specific_json_structure(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/api/album/');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'albumName',
                'metadata'
            ]);
    }
}
