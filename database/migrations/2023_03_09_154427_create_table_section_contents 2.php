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
        Schema::create("section_contents", function (Blueprint $table) {
            $table->foreignId("section_id")
                ->constrained("sections")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->enum("language", ["en", "fr"])->default("en");
            $table->text("description");
            $table->text("what_i_learned");

            $table->primary(["section_id", "language"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("section_contents");
    }
};
