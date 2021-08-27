<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_post', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('post_name');
            $table->text('post_desc');
            $table->string('post_image');
            $table->text('post_content');
            $table->text('post_meta_data')->nullable();
            $table->string('post_keyword')->nullable();
            $table->tinyInteger('post_status')->default(0);
            $table->integer('post_order')->default(0);
            $table->tinyInteger('post_view_count')->default(0);
            $table->string('post_slug');
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
        Schema::dropIfExists('tbl_post');
    }
}
