<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuonsachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuonsach', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('masach', 10)->nullable();
            $table->integer('mads')->nullable()->index('mads');
            $table->date('ngaynhap')->nullable();
            $table->boolean('tinhtrang')->nullable();
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
        Schema::dropIfExists('cuonsach');
    }
}
