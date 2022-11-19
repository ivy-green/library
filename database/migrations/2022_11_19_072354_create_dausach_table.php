<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDausachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dausach', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('mads', 10)->nullable();
            $table->integer('mats')->nullable()->index('mats');
            $table->string('nhaxb', 100)->nullable();
            $table->integer('ngonngu')->nullable()->index('ngonngu');
            $table->string('bia', 250)->nullable();
            $table->float('soluong', 10, 0)->nullable();
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
        Schema::dropIfExists('dausach');
    }
}
