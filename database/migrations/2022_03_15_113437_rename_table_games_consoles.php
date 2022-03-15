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
        Schema::table('games_consoles', function (Blueprint $table) {
            Schema::rename('games_consoles', 'console_game');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games_consoles', function (Blueprint $table) {
            Schema::rename('console_game', 'games_consoles');
        });
    }
};
