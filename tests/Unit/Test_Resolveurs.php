<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticatedTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test a function that requires authentication.
     *
     * @return void
     */
    public function testAuthenticatedFunction()
    {
        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Make a request to the authenticated function
        $response = $this->get('/resolveurs');

        // Assert the expected behavior based on the response
        $response->assertStatus(200);
        // Add more assertions as needed
    }
}
