<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaidgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaidg', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('maloai', 10)->nullable();
            $table->string('tenloai', 100)->nullable();
            $table->string('ghichu', 250)->nullable();
            $table->float('ngaytra', 10, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaidg');
    }
}
