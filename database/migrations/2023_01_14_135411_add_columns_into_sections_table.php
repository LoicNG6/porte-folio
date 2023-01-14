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
        Schema::table("sections", function (Blueprint $table) {
            $table->string("img");
            $table->text("main_information");
            $table->text("learned");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("sections", function (Blueprint $table) {
            $table->dropColumn("img");
            $table->dropColumn("main_information");
            $table->dropColumn("learned");
        });
    }
};
