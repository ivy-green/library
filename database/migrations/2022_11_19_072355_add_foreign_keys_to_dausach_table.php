<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDausachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dausach', function (Blueprint $table) {
            $table->foreign(['ngonngu'], 'dausach_ibfk_2')->references(['id'])->on('ngonngu');
            $table->foreign(['mats'], 'dausach_ibfk_1')->references(['id'])->on('tuasach');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dausach', function (Blueprint $table) {
            $table->dropForeign('dausach_ibfk_2');
            $table->dropForeign('dausach_ibfk_1');
        });
    }
}
