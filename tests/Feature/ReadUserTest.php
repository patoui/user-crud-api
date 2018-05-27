<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ReadUserTest extends TestCase
{
    /**
     * @test
     * Test if a user can be created
     *
     * @return void
     */
    public function read_user()
    {
        // Arrange
        $user = factory(User::class)->states(['admin'])->create();
        $readUser = factory(User::class)->states(['public-user'])->create([
            'username' => 'Jane Doe',
            'email' => 'jane.doe@test.com',
        ]);
        Passport::actingAs($user);

        // Act
        $response = $this->getJson("/api/users/{$readUser->getRouteKey()}");

        // Assert
        $response->assertStatus(200);
        $response->assertExactJson([$readUser->toArray()]);
    }
}
