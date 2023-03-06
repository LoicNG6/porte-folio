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
        Schema::table("topics", function (Blueprint $table) {
            $table->date("started_at")->nullable();
            $table->date("ended_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("topics", function (Blueprint $table) {
            $table->dropColumn(["started_at", "ended_at"]);
        });
    }
};
