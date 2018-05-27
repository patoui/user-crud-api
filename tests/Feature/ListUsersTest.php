<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListUsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test listing all users
     *
     * @return void
     */
    public function list_users()
    {
        // Arrange
        $users = factory(User::class, 10)->create();

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        foreach ($users as $key => $user) {
            $response->assertSee($user->username);
        }
    }
}
