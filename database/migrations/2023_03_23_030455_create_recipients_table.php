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
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name');
            $table->string('recipient_address');
            $table->string('recipient_city');
            $table->string('recipient_state');
            $table->string('recipient_zip');
            //$table->foreign('shipments_id')->references('id')->on('shipments');
            //$table->foreign('drivers_id')->references('id')->on('drivers');
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
        Schema::dropIfExists('recipients');
    }
};
