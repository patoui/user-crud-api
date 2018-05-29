<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a user can be created
     *
     * @return void
     */
    public function create_user()
    {
        // Arrange
        factory(Role::class)->states(['public-user'])->create();

        // Act
        $response = $this->postJson('/api/users', [
            'role' => 'Public User',
            'username' => 'John Doe',
            'email' => 'john.doe@test.com',
        ]);

        // Assert
        $response->assertStatus(201);
        $response->assertJson(['username' => 'John Doe']);
        $response->assertJson(['email' => 'john.doe@test.com']);
    }
}
