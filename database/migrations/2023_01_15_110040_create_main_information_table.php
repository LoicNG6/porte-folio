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
        Schema::create('main_information', function (Blueprint $table) {
            $table->unsignedBigInteger("section_id", false)->primary();
            $table->string("started_date");
            $table->string("ended_date");
            $table->string("location");
            $table->string("context");
            $table->string("team");
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_information');
    }
};
