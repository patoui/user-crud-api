<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UpdateUserApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a user can be updated
     *
     * @return void
     */
    public function update_user()
    {
        // Arrange
        $user = factory(User::class)->states(['admin'])->create();
        factory(Role::class)->states(['publisher'])->create();
        $readUser = factory(User::class)->states(['public-user'])->create([
            'username' => 'Jane Doe',
            'email' => 'jane.doe@test.com',
        ]);
        Passport::actingAs($user);

        // Act
        $response = $this->putJson("/api/users/{$readUser->getRouteKey()}", [
            'role' => 'Publisher',
            'username' => 'Foo Bar',
            'email' => 'foo.bar@test.com',
        ]);

        // Assert
        $response->assertStatus(200);
        $readUser = $readUser->fresh(); // get the updated user model
        $response->assertJson(['username' => 'Foo Bar']);
        $response->assertJson(['email' => 'foo.bar@test.com']);
    }
}
