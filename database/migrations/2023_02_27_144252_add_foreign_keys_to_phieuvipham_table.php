<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPhieuviphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phieuvipham', function (Blueprint $table) {
            $table->foreign(['maphieu'], 'phieuvipham_ibfk_1')->references(['id'])->on('phieumuontra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phieuvipham', function (Blueprint $table) {
            $table->dropForeign('phieuvipham_ibfk_1');
        });
    }
}
