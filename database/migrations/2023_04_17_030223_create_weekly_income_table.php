<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyIncomeTable extends Migration
{
    public function up()
    {
        Schema::create('weekly_income', function (Blueprint $table) {
            $table->id();
            $table->integer('week1');
            $table->integer('week2');
            $table->integer('week3');
            $table->integer('week4');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weekly_income');
    }
}
