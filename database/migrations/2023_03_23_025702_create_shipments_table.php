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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('company_id');
            //$table->foreign('company_id')->references('id')->on('companies');
            //$table->unsignedBigInteger('employee_id');
            //$table->foreign('employee_id')->references('id')->on('employees');
            $table->string('tracking_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('sender_name');
            $table->string('sender_address');
            $table->string('sender_city');
            $table->string('sender_state');
            $table->string('sender_zip');
            $table->string('recipient_name');
            $table->string('recipient_address');
            $table->string('recipient_city');
            $table->string('recipient_state');
            $table->string('recipient_zip');
            $table->decimal('length', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
            $table->decimal('weight', 8, 2);
            $table->unsignedBigInteger('bid_amount')->nullable()->default;
            $table->string('company_bade')->nullable()->default;
            //$table->string('vehicle_type');
            //$table->string('cargo_type');
            $table->decimal('total_price', 8, 2);
            $table->string('order_status')->nullable()->default;
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
        Schema::dropIfExists('shipments');
    }
};
