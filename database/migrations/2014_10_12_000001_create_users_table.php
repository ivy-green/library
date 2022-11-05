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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('ten');
            $table->string('email')->unique();
            $table->integer('gioitinh');
            $table->date('ngaysinh');     
            $table->string('dienthoai');
            $table->string('diachi');  
            $table->string('password');
            $table->string('anhdaidien')->nullable();
            $table->dateTime('create_at')->nullable();
            $table->dateTime('update_at')->nullable();

            $table->foreignId('maquyen')->nullable()->constrained('accesses')->onDelete('set null');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
