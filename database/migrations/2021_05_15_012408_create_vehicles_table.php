<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('color');
            $table->string('marca');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('driver_id')->unique();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('driver_id')->references('person_id')->on('drivers');
            $table->foreign('owner_id')->references('person_id')->on('owners');
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
        Schema::dropIfExists('vehicles');
    }
}
