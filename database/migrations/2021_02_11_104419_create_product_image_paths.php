<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * This schema will hold all the paths to all the images that a particular product might have
 * it will not have a primary key
 */
class CreateProductImagePaths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image_paths', function (Blueprint $table) {
            $table->bigInteger('product_id')->index();
            $table->string('product_image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_image_paths');
    }
}
