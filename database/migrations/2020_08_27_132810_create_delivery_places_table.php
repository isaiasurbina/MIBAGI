<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_places', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('user_name')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('phone');
            $table->string('clue')->nullable();
            $table->string('latlng');
            
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
        Schema::dropIfExists('delivery_places');
    }
}
