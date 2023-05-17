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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('company_id')->nullable()->default(null);
            $table->unsignedBigInteger('dispatcher_id')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('contact_no');
            $table->string('vehicle_type');
            $table->string('license_number');
            $table->string('plate_no');
            $table->string('tel')->nullable()->default(null);
            $table->string('street')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('postal_code')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('linkedin')->nullable()->default(null);
            $table->boolean('archived')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('dispatcher_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('drivers');
    }
};
