<?php

use App\Models\Professional;
use App\Models\Speciality;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_speciality', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Professional::class);
            $table->foreignIdFor(Speciality::class);
            $table->unique(['professional_id', 'speciality_id'], 'unique_pivot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('professional_speciality', function(Blueprint $table){
        //     $table->dropIndex(['unique_pivot']);
        // });
        Schema::dropIfExists('professional_speciality');
    }
};
