<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('property_type_id')->unsigned();
            $table->bigInteger('transaction_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('structure_id')->unsigned();
            $table->bigInteger('heating_id')->unsigned();
            $table->bigInteger('parking_id')->unsigned()->nullable();
            $table->integer('area');
            $table->string('title');
            $table->text('description');
            $table->string('adress');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('floor');
            $table->integer('last_floor');
            $table->boolean('newbuilt')->nullable();
            $table->float('price');
            $table->string('featured_image');
            $table->string('video')->default(null);
            $table->timestamps();

            $table->index('property_type_id');
            $table->index('transaction_id');
            $table->index('location_id');
            $table->index('structure_id');
            $table->index('heating_id');
            $table->index('parking_id');



            $table->foreign('property_type_id')->references('id')->on('property_type')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
            $table->foreign('structure_id')->references('id')->on('structure')->onDelete('cascade');
            $table->foreign('heating_id')->references('id')->on('heating')->onDelete('cascade');
            $table->foreign('parking_id')->references('id')->on('parking')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
