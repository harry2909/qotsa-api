<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Throwable;

class UserTest extends TestCase
{

    use DatabaseMigrations;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->user = User::factory()->create();
    }

    /** @test */
    public function user_added_to_db(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'email' => 'test@test2.com',
            'password' => 'test1235!'
        ]);

        $response->assertStatus(200);
        // We create a user at the start of the test, so there should be 2
        $this->assertCount(2, User::all());
    }

    /** @test */
    public function test_user_validation(): void
    {
        $this->post('/register', [
            'email' => 'test',
            'password' => 'test1235!'
        ])->assertSessionHasErrors('email');

        $this->post('/register', [
            'email' => 'test@test2.com',
        ])->assertSessionHasErrors('password');
    }

    /** @test */
    public function user_can_login(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        $response->assertStatus(200);
        $this->assertAuthenticatedAs($this->user);
    }

    /** @test
     * @throws Throwable
     * Check if the response contains a token string
     */
    public function user_receives_token(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/generate-token/');
        $jsonResponse = $response->decodeResponseJson();
        if (isset($jsonResponse['token'])) {
            $this->assertIsString($jsonResponse['token']);
        } else {
            $this->fail('The "token" key was not found in the JSON response.');
        }
    }

    /** @test */
    public function generate_token_endpoint_returns_false_if_user_not_logged_in(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/generate-token/');
        $response->assertJson(['token' => false]);
    }

    /** @test */
    public function user_can_logout(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)->json('GET', '/logout/');
        $response->assertStatus(200);
    }
}
