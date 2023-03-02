<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBinshopsPostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binshops_post_categories', function (Blueprint $table) {
            $table->foreign(['post_id'])->references(['id'])->on('binshops_posts')->onDelete('CASCADE');
            $table->foreign(['category_id'])->references(['id'])->on('binshops_categories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('binshops_post_categories', function (Blueprint $table) {
            $table->dropForeign('binshops_post_categories_post_id_foreign');
            $table->dropForeign('binshops_post_categories_category_id_foreign');
        });
    }
}
