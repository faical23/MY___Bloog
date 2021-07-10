<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_post', function (Blueprint $table) {
            $table->id();
            $table->string('post_titre');
            $table->string('post_topic');
            $table->string('post_img');
            $table->text('post_description');
            $table->integer('post_like');
            $table->string('post_ID');
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
        Schema::dropIfExists('_post');
    }
}
