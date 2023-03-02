<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtphieumuontraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctphieumuontra', function (Blueprint $table) {
            $table->integer('maphieu')->nullable()->index('maphieu');
            $table->integer('masach')->nullable()->index('masach');
            $table->integer('mads')->nullable()->index('mads');
            $table->string('tinhtrang', 250)->nullable();
            $table->integer('mavp')->nullable()->index('mavp');
            $table->dateTime('ngaytra')->nullable();
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
        Schema::dropIfExists('ctphieumuontra');
    }
}
