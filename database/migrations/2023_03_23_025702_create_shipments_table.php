<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_mobile');
            $table->string('sender_tel')->nullable()->default;
            $table->string('sender_email');
            $table->string('sender_address');
            $table->string('sender_city');
            $table->string('sender_state');
            $table->string('sender_zip');
            $table->unsignedBigInteger('shipment_id')->nullable()->default;
            $table->timestamps();
        });
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name');
            $table->string('recipient_mobile');
            $table->string('recipient_tel')->nullable()->default;
            $table->string('recipient_email');
            $table->string('recipient_address');
            $table->string('recipient_city');
            $table->string('recipient_state');
            $table->string('recipient_zip');
            $table->unsignedBigInteger('shipment_id')->nullable()->default;
            $table->timestamps();
        });
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('station_id');
            $table->string('tracking_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('senders');
            $table->unsignedBigInteger('recipient_id');
            $table->foreign('recipient_id')->references('id')->on('recipients');
            $table->decimal('weight', 8, 2);
            $table->decimal('length', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
            $table->string('service_type');
            $table->string('order_type');
            $table->string('category');
            $table->unsignedBigInteger('min_bid_amount');
            $table->string('mode_of_payment')->nullable()->default;
            $table->unsignedBigInteger('bid_amount')->nullable()->default;
            $table->string('company_bid')->nullable()->default;
            //$table->string('vehicle_type');
            //$table->string('cargo_type');
            $table->decimal('total_price', 8, 2)->nullable()->default;
            $table->string('order_status')->nullable()->default;
            $table->string('status');
            $table->string('photo', 300);
            $table->timestamps();
        });
        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('status');
            $table->timestamps();

            // Define foreign key constraint for the order_id column
            $table->foreign('order_id')
                  ->references('id')->on('shipments')
                  ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('oder_histories');
        Schema::dropIfExists('senders');
        Schema::dropIfExists('recipients');
        Schema::dropIfExists('shipments');
    }
};
