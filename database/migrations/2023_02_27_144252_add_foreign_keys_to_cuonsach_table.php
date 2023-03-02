<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCuonsachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuonsach', function (Blueprint $table) {
            $table->foreign(['mads'], 'cuonsach_ibfk_1')->references(['id'])->on('dausach');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuonsach', function (Blueprint $table) {
            $table->dropForeign('cuonsach_ibfk_1');
        });
    }
}
