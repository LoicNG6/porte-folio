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
        Schema::create('subjects', function (Blueprint $table) {
            $table->unsignedBigInteger("id", false);
            $table->unsignedBigInteger("section_id", false);
            $table->date("started_at");
            $table->date("ended_at");
            $table->string("location");
            $table->string("team");
            $table->string("description");

            $table->primary("id", "section_id");
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
        Schema::dropIfExists('subjects');
    }
};
