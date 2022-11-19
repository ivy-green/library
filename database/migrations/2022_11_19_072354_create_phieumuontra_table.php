<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieumuontraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieumuontra', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('maphieu', 10)->nullable();
            $table->integer('madg')->nullable()->index('madg');
            $table->integer('matt')->nullable()->index('matt');
            $table->dateTime('ngaylapphieu')->nullable();
            $table->date('ngaytradukien')->nullable();
            $table->date('ngaytra')->nullable();
            $table->integer('mavp')->nullable()->index('mavp');
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
        Schema::dropIfExists('phieumuontra');
    }
}
