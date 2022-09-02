<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('blog_category_id')->unsigned()->index()->comment('ID категории');
            $table->integer('blog_author_id')->unsigned()->index()->comment('ID автора');
            $table->string('keywords', 50)->nullable()->comment('SEO-ключи');
            $table->string('description')->nullable()->comment('SEO-описание');
            $table->string('slug')->unique()->comment('чпу');
            $table->string('title')->unique()->comment('название');
            $table->text('content')->comment('текст');
            $table->string('thumbnail')->nullable()->comment('изображение');
            $table->boolean('is_published')->default(0)->comment('статус');
            $table->bigInteger('views')->default(0)->comment('просмотры');
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
        Schema::dropIfExists('blog_posts');
    }
}
