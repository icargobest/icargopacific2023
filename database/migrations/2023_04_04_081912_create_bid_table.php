<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
<<<<<<< HEAD
            $table->string('company_name');
            $table->unsignedBigInteger('shipment_id');
=======
            // $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('shipment_id');
            // $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
>>>>>>> develop
            $table->unsignedBigInteger('bid_amount');
            $table->string('status');
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
        Schema::dropIfExists('bids');
    }
};
