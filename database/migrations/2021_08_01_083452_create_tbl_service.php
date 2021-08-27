<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('service_name');
            $table->text('service_desc');
            $table->string('service_image');
            $table->text('service_content');
            $table->text('service_meta_data')->nullable();
            $table->string('service_keyword')->nullable();
            $table->tinyInteger('service_status')->default(0);
            $table->integer('service_order')->default(0);
            $table->tinyInteger('service_view_count')->default(0);
            $table->string('service_slug');
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
        Schema::dropIfExists('tbl_service');
    }
}
