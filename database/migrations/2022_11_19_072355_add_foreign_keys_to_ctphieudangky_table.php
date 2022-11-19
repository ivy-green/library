<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCtphieudangkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ctphieudangky', function (Blueprint $table) {
            $table->foreign(['mads'], 'ctphieudangky_ibfk_2')->references(['id'])->on('dausach');
            $table->foreign(['maphieu'], 'ctphieudangky_ibfk_1')->references(['id'])->on('phieudangky');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ctphieudangky', function (Blueprint $table) {
            $table->dropForeign('ctphieudangky_ibfk_2');
            $table->dropForeign('ctphieudangky_ibfk_1');
        });
    }
}
