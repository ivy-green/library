<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuasachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuasach', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('mats', 10)->nullable();
            $table->string('tents', 250)->nullable();
            $table->integer('tacgia')->nullable()->index('tacgia');
            $table->integer('theloai')->nullable()->index('theloai');
            $table->string('tomtat', 250)->nullable();
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
        Schema::dropIfExists('tuasach');
    }
}
