<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('parent_id')->unsigned()->default(0)->comment('ID родителя');
            $table->integer('user_id')->unsigned()->default(0)->comment('ID пользователя');
            $table->integer('blog_post_id')->unsigned()->default(0)->comment('ID поста');
            $table->string('name', 100)->comment('имя');
            $table->string('email')->comment('email');
            $table->string('comment')->comment('комментарий');
            $table->boolean('is_active')->default(0)->comment('статус');
            $table->timestamps();

            $table->foreign('blog_post_id')
                ->references('id')
                ->on('blog_posts')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comments');
    }
}
