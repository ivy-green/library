<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuyentruycapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyentruycap', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('maquyen', 10)->nullable();
            $table->string('tenquyen', 250)->nullable();
            $table->string('ghichu', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyentruycap');
    }
}
