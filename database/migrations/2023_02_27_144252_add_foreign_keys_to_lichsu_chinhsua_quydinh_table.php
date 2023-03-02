<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLichsuChinhsuaQuydinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lichsu_chinhsua_quydinh', function (Blueprint $table) {
            $table->foreign(['maqd'], 'lichsu_chinhsua_quydinh_ibfk_1')->references(['id'])->on('quydinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lichsu_chinhsua_quydinh', function (Blueprint $table) {
            $table->dropForeign('lichsu_chinhsua_quydinh_ibfk_1');
        });
    }
}
