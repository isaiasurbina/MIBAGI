<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('AuthCode');
            $table->string('CVV2Result');
            $table->string('OriginalResponseCode');
            $table->string('PaddedCardNumber');
            $table->string('ReasonCode');
            $table->string('ReasonCodeDescription');
            $table->string('ReferenceNumber');
            $table->string('ResponseCode');
            $table->string('TokenizedPAN');
            $table->string('orderNumber');
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
        Schema::dropIfExists('payments');
    }
}
