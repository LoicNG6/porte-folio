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
        Schema::create('sections', function (Blueprint $table) {
            $table->unsignedBigInteger("id", false);
            $table->foreignId('topic_id')
                ->constrained('topics')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('what_i_learned')->nullable();

            $table->primary("id","topic_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
