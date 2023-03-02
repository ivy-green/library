<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBinshopsPostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binshops_post_translations', function (Blueprint $table) {
            $table->foreign(['lang_id'])->references(['id'])->on('binshops_languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('binshops_post_translations', function (Blueprint $table) {
            $table->dropForeign('binshops_post_translations_lang_id_foreign');
        });
    }
}
