<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPhieubaocaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phieubaocao', function (Blueprint $table) {
            $table->foreign(['matt'], 'phieubaocao_ibfk_1')->references(['matt'])->on('thuthu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phieubaocao', function (Blueprint $table) {
            $table->dropForeign('phieubaocao_ibfk_1');
        });
    }
}
