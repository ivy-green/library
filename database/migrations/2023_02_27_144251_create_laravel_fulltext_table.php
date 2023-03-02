<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelFulltextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_fulltext', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indexable_id');
            $table->string('indexable_type');
            $table->text('indexed_title')->fulltext('fulltext_title');
            $table->text('indexed_content');
            $table->timestamps();

            $table->fullText(['indexed_title', 'indexed_content'], 'fulltext_title_content');
            $table->unique(['indexable_type', 'indexable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laravel_fulltext');
    }
}
