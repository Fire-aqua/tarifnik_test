<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('area_type_full')->nullable();
            $table->string('city')->nullable();
            $table->string('city_type_full')->nullable();
            $table->string('federal_district')->nullable();
            $table->string('geo_lat')->nullable();
            $table->string('geo_lon')->nullable();
            $table->string('house');
            $table->string('house_type_full')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('region')->nullable();
            $table->string('region_type_full')->nullable();
            $table->string('settlement')->nullable();
            $table->string('settlement_type_full')->nullable();
            $table->string('street')->nullable();
            $table->string('street_type_full')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
