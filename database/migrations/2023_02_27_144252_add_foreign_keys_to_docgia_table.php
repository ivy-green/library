<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docgia', function (Blueprint $table) {
            $table->foreign(['loaidg'], 'docgia_ibfk_2')->references(['id'])->on('loaidg');
            $table->foreign(['madg'], 'docgia_ibfk_1')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docgia', function (Blueprint $table) {
            $table->dropForeign('docgia_ibfk_2');
            $table->dropForeign('docgia_ibfk_1');
        });
    }
}
