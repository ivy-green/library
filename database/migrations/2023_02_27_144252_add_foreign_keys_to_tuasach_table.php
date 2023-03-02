<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTuasachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuasach', function (Blueprint $table) {
            $table->foreign(['theloai'], 'tuasach_ibfk_2')->references(['id'])->on('theloai');
            $table->foreign(['tacgia'], 'tuasach_ibfk_1')->references(['id'])->on('tacgia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuasach', function (Blueprint $table) {
            $table->dropForeign('tuasach_ibfk_2');
            $table->dropForeign('tuasach_ibfk_1');
        });
    }
}
