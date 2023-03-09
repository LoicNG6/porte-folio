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
        Schema::create('subject_contents', function (Blueprint $table) {
            $table->foreignId("subject_id")
                ->constrained("subjects")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->enum("language", ["en", "fr"])->default("en");
            $table->text("description");

            $table->primary(["subject_id", "language"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("subject_contents");
    }
};
