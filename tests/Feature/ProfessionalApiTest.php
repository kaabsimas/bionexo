<?php

namespace Tests\Feature;

use App\Models\Professional;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfessionalApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Tests new professional store.
     *
     * @return void
     */
    public function test_new_professional_store_successfuly()
    {
        $user = User::factory()->create();
        $professional = Professional::factory()->make();
        $specialities = Speciality::factory()->count(3)->create();

        $response = $this->actingAs($user)->post('/professional', [
            'name' => $professional->name,
            'crm' => $professional->crm,
            'phone' => $professional->phone,
            'specialities' => $specialities->pluck('id')->toArray()
        ]);
        
        $response->assertStatus(200)->dump();

        $professional = Professional::find($response->json('id'));

        $this->assertTrue(
            $professional->specialities()
                ->whereIn(
                    'specialities.id', 
                    $specialities->pluck('id')->toArray()
                )
                ->exists()
            );
    }
}
