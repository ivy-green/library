<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichsuChinhsuaQuydinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsu_chinhsua_quydinh', function (Blueprint $table) {
            $table->integer('maqd')->nullable()->index('maqd');
            $table->dateTime('ngay')->nullable();
            $table->string('noidung_cu', 250)->nullable();
            $table->string('noidung_moi', 250)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lichsu_chinhsua_quydinh');
    }
}
