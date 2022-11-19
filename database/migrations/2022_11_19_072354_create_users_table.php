<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('custom_id', 10)->nullable();
            $table->string('password', 250)->nullable();
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->string('ten', 250)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('ngaysinh')->nullable();
            $table->dateTime('ngaydk')->nullable();
            $table->integer('gioitinh')->nullable();
            $table->string('dienthoai', 15)->nullable();
            $table->string('diachi', 250)->nullable();
            $table->integer('maquyen')->nullable()->index('maquyen');
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
        Schema::dropIfExists('users');
    }
}
