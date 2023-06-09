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
            $table->string('company_name')->nullable()->default;
            $table->string('tracking_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on('senders')->onDelete('cascade');
            $table->unsignedBigInteger('recipient_id');
            $table->foreign('recipient_id')->references('id')->on('recipients')->onDelete('cascade');
            $table->string('item');
            $table->decimal('weight', 8, 2);
            $table->decimal('length', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
            $table->string('service_type');
            $table->string('order_type');
            $table->unsignedBigInteger('min_bid_amount');
            $table->string('mop')->nullable()->default;
            $table->unsignedBigInteger('bid_amount')->nullable()->default;
            $table->unsignedBigInteger('company_id')->nullable()->default;
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('driver_id')->nullable()->default;
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->unsignedBigInteger('dispatcher_id')->nullable()->default;
            $table->foreign('dispatcher_id')->references('id')->on('dispatchers')->onDelete('cascade');
            // $table->foreign('company_id')->references('user_id')->on('companies')->onDelete('cascade');
            //$table->string('vehicle_type');
            //$table->string('cargo_type');
            $table->decimal('total_price', 8, 2)->nullable()->default;
            $table->decimal('advFreight_total_amount')->nullable()->default;
            $table->timestamp('shipping_date')->nullable()->default;
            $table->string('order_status')->nullable()->default;
            $table->string('advTransferredfrom')->nullable()->default;
            $table->string('advTransferredto')->nullable()->default;
            $table->string('advTransferredStatus')->nullable()->default;
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
            $table->boolean('isCancelled')->default(false);
            $table->dateTime('isCancelledTime')->nullable();
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
        Schema::disableForeignKeyConstraints();

        // Truncate tables
        DB::table('senders')->truncate();
        DB::table('recipients')->truncate();
        DB::table('order_histories')->truncate();
        DB::table('bids')->truncate();
        DB::table('shipments')->truncate();

        // Drop tables
        Schema::dropIfExists('senders');
        Schema::dropIfExists('recipients');
        Schema::dropIfExists('order_histories');
        Schema::dropIfExists('bids');
        Schema::dropIfExists('shipments');

        Schema::enableForeignKeyConstraints();
    }
};
