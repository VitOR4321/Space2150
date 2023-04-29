<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // jak nie zadziała to zrobić od nowa
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_skills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('module_crew_id')->unsigned();
            $table->foreign('module_crew_id')->references('id')->on('module_crew');
            $table->string('name', 15)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_skills');
    }
};
