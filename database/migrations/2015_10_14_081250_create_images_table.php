<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function(Blueprint $table){

            $table->increments('id');
            $table->string('name')->unique();
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
            $table->integer('user_id');
//            $table->string('ip');
            $table->string('ip')->unique();
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
        Schema::drop('images');
    }
}
