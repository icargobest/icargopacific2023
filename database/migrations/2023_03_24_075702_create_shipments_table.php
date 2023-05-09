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
<<<<<<< HEAD:database/migrations/2023_05_03_075702_create_shipments_table.php
            //$table->unsignedBigInteger('shipment_id')->nullable();
            // $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
=======
>>>>>>> develop:database/migrations/2023_03_24_075702_create_shipments_table.php
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
<<<<<<< HEAD:database/migrations/2023_05_03_075702_create_shipments_table.php
            //$table->unsignedBigInteger('shipment_id')->nullable();
            // $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
=======
>>>>>>> develop:database/migrations/2023_03_24_075702_create_shipments_table.php
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
            $table->string('station_id')->nullable()->default;
            $table->string('tracking_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('senders')->onDelete('cascade');
            $table->unsignedBigInteger('recipient_id');
            $table->foreign('recipient_id')->references('id')->on('recipients')->onDelete('cascade');
            $table->decimal('weight', 8, 2);
            $table->decimal('length', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
            $table->string('service_type');
            $table->string('order_type');
            $table->string('category');
            $table->unsignedBigInteger('min_bid_amount');
            $table->string('mop')->nullable()->default;
            $table->unsignedBigInteger('bid_amount')->nullable()->default;
            $table->unsignedBigInteger('company_id')->nullable()->default;
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            //$table->string('vehicle_type');
            //$table->string('cargo_type');
            $table->decimal('total_price', 8, 2)->nullable()->default;
            $table->string('order_status')->nullable()->default;
            $table->string('status');
            $table->string('photo', 300);
            $table->timestamps();
        });

        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('bid_amount');
            $table->string('status');
            $table->timestamps();


            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
        });

        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id');
            $table->boolean('isPending')->default(false);
            $table->dateTime('isPendingTime')->nullable();
            $table->boolean('isProcessed')->default(false);
            $table->dateTime('isProcessedTime')->nullable();
            $table->boolean('isPickUp')->default(false);
            $table->dateTime('isPickUpTime')->nullable();
            $table->boolean('isAssort')->default(false);
            $table->dateTime('isAssortTime')->nullable();
            $table->boolean('isTransferred')->default(false);
            $table->dateTime('isTransferredTime')->nullable();
            $table->boolean('isArrived')->default(false);
            $table->dateTime('isArrivedTime')->nullable();
            $table->boolean('isDispatched')->default(false);
            $table->dateTime('isDispatchedTime')->nullable();
            $table->boolean('isDelivered')->default(false);
            $table->dateTime('isDeliveredTime')->nullable();
            $table->timestamps();

            // Define foreign key constraint for the order_id column
            $table->foreign('shipment_id')
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

        Schema::dropIfExists('senders');
        Schema::dropIfExists('recipients');

        Schema::dropIfExists('order_histories');
        Schema::dropIfExists('bids');
        Schema::dropIfExists('shipments');
    }
};
