<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id');
            $table->string('title');
            $table->integer('price'); //cents
            $table->string('description');
            $table->longText('fulltext');
            $table->string('thumbnail');
            $table->integer('plus');
            $table->string('rating');
            $table->string('dimentions');
            $table->string('weight');
            $table->longText('custom_fields');

            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
