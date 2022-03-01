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
        Schema::create('games_consoles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('games_id');
            $table->unsignedBigInteger('consoles_id');
            $table->timestamps();
            $table->foreign('games_id')->references('id')->on('games');
            $table->foreign('consoles_id')->references('id')->on('consoles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_consoles');
    }
};
