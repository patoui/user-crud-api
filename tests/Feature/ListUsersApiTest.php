<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ListUsersApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a user can be created
     *
     * @return void
     */
    public function list_users()
    {
        // Arrange
        $user = factory(User::class)->states(['admin'])->create();
        $public = factory(Role::class)->states(['public-user'])->create();
        factory(User::class)->states(['public-user'])->create([
            'username' => 'John Doe',
            'user_roles_id' => $public->id,
        ]);
        factory(User::class)->states(['public-user'])->create([
            'username' => 'Jane Doe',
            'user_roles_id' => $public->id,
        ]);
        Passport::actingAs($user);

        // Act
        $response = $this->getJson('/api/users');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonFragment(['username' => 'John Doe']);
        $response->assertJsonFragment(['username' => 'Jane Doe']);
    }
}
