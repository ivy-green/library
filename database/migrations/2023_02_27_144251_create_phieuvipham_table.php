<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuviphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuvipham', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('maphieu')->nullable()->index('maphieu');
            $table->float('tienvipham', 10, 0)->nullable();
            $table->float('dathanhtoan', 10, 0)->nullable();
            $table->string('ghichu', 250)->nullable();
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
        Schema::dropIfExists('phieuvipham');
    }
}
