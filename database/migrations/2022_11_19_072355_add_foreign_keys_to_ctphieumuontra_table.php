<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCtphieumuontraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ctphieumuontra', function (Blueprint $table) {
            $table->foreign(['masach'], 'ctphieumuontra_ibfk_2')->references(['id'])->on('cuonsach');
            $table->foreign(['maphieu'], 'ctphieumuontra_ibfk_1')->references(['id'])->on('phieumuontra');
            $table->foreign(['mavp'], 'ctphieumuontra_ibfk_3')->references(['id'])->on('phieuvipham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ctphieumuontra', function (Blueprint $table) {
            $table->dropForeign('ctphieumuontra_ibfk_2');
            $table->dropForeign('ctphieumuontra_ibfk_1');
            $table->dropForeign('ctphieumuontra_ibfk_3');
        });
    }
}
