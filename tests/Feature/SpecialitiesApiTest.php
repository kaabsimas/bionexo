<?php declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class SpecialitiesApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test one can retrieve a new token from already authenticated dashboard
     * 
     * @return void
     */
    public function test_retrieve_token_when_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/api/tokens/create');

        $response->dump();

        $response
            ->assertJson(fn(AssertableJson $json) => $json->has('token'))
            ->assertSuccessful();
    }

    /**
     * Test you can't create a token if not statefuly authenticated
     * 
     * @return void
     */
    public function test_you_cannot_create_token_if_not_authenticated()
    {        
        $this->post('/api/tokens/create')
            ->assertRedirect('/login');
    }

    /**
     * Tests that the route retrieves information from specialities table.
     *
     * @return void
     */
    public function test_retrieve_specialities_json()
    {
        $this->seed();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/specialities');

        $response->assertJson(fn(AssertableJson $json) => 
            $json
                ->has(15)
                ->first(fn($json) => 
                    $json->where('id', 1)
                        ->where('name', 'ALERGOLOGIA')
                        ->etc()
                )
        );
    }

    /**
     * Tests one cannot access specialities without the token
     * 
     * @return void
     */
    public function test_you_cant_retrieve_specialities_without_authentication()
    {
        $response = $this->get('/api/specialities');

        $response->assertRedirect('/login');
    }
}
