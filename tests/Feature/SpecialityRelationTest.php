<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Speciality;
use App\Models\Professional;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecialityRelationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests proper generation of a relation between a professional and a specality.
     *
     * @return void
     */
    public function test_attach_method_generates_relation()
    {
        $professional = Professional::factory()->create();
        $speciality = Speciality::factory()->create(['name' => 'Pediatrics']);

        $professional->specialities()->attach($speciality);

        $this->assertDatabaseHas('specialities', ['name' => 'Pediatrics']);
        $this->assertEquals(
            $speciality->attributes, 
            $professional->specialities->first()->attributes, 
            "The speciality is not related to the professional"
        );
    }

    /**
     * Tests two professionals can have the same speciality.
     *
     * @return void
     */
    public function test_multiple_professionals_can_have_the_same_speciality()
    {
        $speciality = Speciality::factory()->create(['name' => 'Cardiology']);

        $house = Professional::factory()->hasAttached($speciality)->create();
        $mccoy = Professional::factory()->hasAttached($speciality)->create();

        $this->assertModelExists($speciality);

        $this->assertEquals(
            $house->specialities->first()->attributes,
            $mccoy->specialities->first()->attributes,
            "The speciality is not being shared between professionals"
        );
    }

    /**
     * Tests a professional cannot have the same speciality twice
     * 
     * @return void
     */
    public function test_professional_cannot_have_the_same_speciality_twice()
    {
        $speciality = Speciality::factory()->create();
        $this->assertModelExists($speciality);

        $professional = Professional::factory()->create();

        $professional->specialities()->attach($speciality);
        $this->assertEquals(
            $speciality->attributes, 
            $professional->specialities->first()->attributes, 
            "The speciality is not related to the professional"
        );

        $this->expectException(\Illuminate\Database\QueryException::class);
        $professional->specialities()->attach($speciality);

    }
}
