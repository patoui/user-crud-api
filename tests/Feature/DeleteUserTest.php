<?php

namespace Tests\Feature;

use App\User;
use DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * Test if a user can be deleted
     *
     * @return void
     */
    public function delete_user()
    {
        // Arrange
        $user = factory(User::class)->states(['admin'])->create();
        $readUser = factory(User::class)->states(['public-user'])->create();
        Passport::actingAs($user);
        $this->assertEquals(
            1,
            DB::table('users')->where('id', $readUser->id)->count()
        );

        // Act
        $response = $this->deleteJson("/api/users/{$readUser->getRouteKey()}");

        // Assert
        $response->assertStatus(200);
        $this->assertEquals(
            0,
            DB::table('users')->where('id', $readUser->id)->count()
        );
    }
}
