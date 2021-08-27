<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contact', function (Blueprint $table) {
            $table->id('contact_id');
            $table->string('contact_name');
            $table->string('contact_address');
            $table->string('contact_phone', 20);
            $table->string('contact_email', 50);
            $table->string('contact_desc')->nullable();
            $table->text('contact_content')->nullable();
            $table->tinyInteger('contact_status')->default(0);
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
        Schema::dropIfExists('tbl_contact');
    }
}
