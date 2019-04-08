<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('wp_blog_id');
            $table->text('blog_created_at');
            $table->integer('author_id')->default(0);
            $table->string('modified_at');
            $table->text('slug');
            $table->text('status');
            $table->text('link');
            $table->text('title');
            $table->text('content');
            $table->text('excerpt');
            $table->integer('featured_media')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wp_category_id');
            $table->string('category', 150);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_category_pivot', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('blog_id');
            $table->integer('category_id');
            $table->timestamps();
        });

        Schema::create('blog_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id');
            $table->integer('featured_blog')->nullable();
            $table->integer('wp_medium_id');
            $table->string('creation_date', 50);
            $table->string('modified_at', 50);
            $table->string('alt_text');
            $table->text('image_url');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_authors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wp_author_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_media');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('blog_category_pivot');
        Schema::dropIfExists('blog_authors');

    }
}
