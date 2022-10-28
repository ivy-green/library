<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_forms', function (Blueprint $table) {
            $table->id();
            
            $table->string('masach');
            $table->integer('madocgia');
            $table->integer('mathuthu');
            $table->date('ngaytra');
            $table->string('vipham');
            $table->integer('soluong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_forms');
    }
};
