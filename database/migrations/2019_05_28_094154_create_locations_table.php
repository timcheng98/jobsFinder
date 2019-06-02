<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
        });

        DB::table('locations')->insert(array(  
            ['location' => 'Central & Western Area'],['location' => 'Cheung Chau Area'],
            ['location' => 'Eastern Area'],['location' => 'Kowloon City Area'],
            ['location' => 'Kwai Tsing Area'],['location' => 'Kwun Tong Area'],
            ['location' => 'Lantau Island'],['location' => 'Northern Area'],
            ['location' => 'Sai Kung Area'],['location' => 'Sham Shui Po Area'],
            ['location' => 'Shatin Area'],['location' => 'Southern Area'],
            ['location' => 'Tai Po Area'],['location' => 'Tuen Mun Area'],
            ['location' => 'Wan Chai Area'],['location' => 'Wong Tai Sin Area'],
            ['location' => 'Yau Tsim Mong'],['location' => 'Yuen Long Area'],
            ['location' => 'Others']
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
