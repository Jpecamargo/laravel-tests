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
        Schema::table('console_game', function (Blueprint $table) {
            $table->renameColumn('games_id', 'game_id');
            $table->renameColumn('consoles_id', 'console_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('console_game', function (Blueprint $table) {
            $table->renameColumn('game_id', 'games_id');
            $table->renameColumn('console_id', 'consoles_id');
        });
    }
};
