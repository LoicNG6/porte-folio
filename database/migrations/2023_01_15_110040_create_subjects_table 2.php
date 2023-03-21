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
            $table->foreignId('section_id')
                ->constrained('sections')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string("started_at")->nullable();
            $table->string("ended_at")->nullable();
            $table->string("location")->nullable();
            $table->string("team")->nullable();

            $table->primary("id", "section_id");
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
