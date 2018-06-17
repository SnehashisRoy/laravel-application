<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->string('postal')->nullable();
            $table->string('country')->nullable();
            $table->string('type')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('furnished')->nullable();
            $table->string('pet_friendly')->nullable();
            $table->string('parking')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('image_url')->nullable();
            $table->string('longitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->boolean('approved')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('house_id')->nullable();
            $table->string('image_url')->nullable();            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
        Schema::dropIfExists('images');
    }
}
