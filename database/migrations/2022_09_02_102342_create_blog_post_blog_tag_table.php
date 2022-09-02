<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_blog_tag', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('blog_post_id')->unsigned()->index()->comment('ID поста');
            $table->integer('blog_tag_id')->unsigned()->index()->comment('ID тега');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_blog_tag');
    }
}
