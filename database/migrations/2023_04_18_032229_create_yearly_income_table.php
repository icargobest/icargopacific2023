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
    Schema::create('yearly_income', function (Blueprint $table) {
        $table->id();
        $table->integer('2023')->nullable();
        $table->integer('2024')->nullable();
        $table->integer('2025')->nullable();
        $table->integer('2026')->nullable();
        $table->integer('2027')->nullable();
        $table->integer('2028')->nullable();
        $table->integer('2029')->nullable();
        $table->integer('2030')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('yearly_income');
    }
};
