<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('categories')->insert(
            array(
                ['name' => 'Accounting / Auditing'],
                ['name' => 'Administration'],
                ['name' => 'Banking / Finance'],
                ['name' => 'Building / Construction'],
                ['name' => 'Design'],
                ['name' => 'Education'],
                ['name' => 'Engineering'],
                ['name' => 'Government / Public Sector'],
                ['name' => 'Health / Beauty Care'],
                ['name' => 'Hotel / Catering / Club'],
                ['name' => 'Human Resources'],
                ['name' => 'Information Technology'],
                ['name' => 'Insurance'],
                ['name' => 'Logistics / Transportation'],
                ['name' => 'Manufacturing'],
                ['name' => 'Marketing / Public Relations'],
                ['name' => 'Media / Advertising'],
                ['name' => 'Medical Services'],
                ['name' => 'Merchandising / Purchasing'],
                ['name' => 'NGO'],
                ['name' => 'Others'],
                ['name' => 'Professional Services'],
                ['name' => 'Property'],
                ['name' => 'Retail'],
                ['name' => 'Sales / CS / Business Devpt'],
                ['name' => 'Sciences / Lab / R&D'],
                ['name' => 'Travel / Tourism'],
            ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
