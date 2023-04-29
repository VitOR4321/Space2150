<?php

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
        Schema::create('module_crew', function (Blueprint $table) {
            $table->id();
            $table->integer('ship_module_id')->unsigned();
            $table->foreign('ship_module_id')->references('id')->on('ship_modules');
            $table->string('nick',10);
            $table->string('gender',1);
            $table->integer('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_crew');
    }
};
