<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyIncomeTable extends Migration
{
    public function up()
    {
        Schema::create('daily_income', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->decimal('income', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_income');
    }
}
