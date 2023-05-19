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
        Schema::create('adv_transfer_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id')-nullable();
            $table->string('company_from')->nullable();
            $table->string('staff_from')->nullable();
            $table->string('company_to')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('adv_transfer_logs');
    }
};
