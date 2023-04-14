<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('income', function (Blueprint $table) {
        $table->id();
        $table->decimal('amount', 8, 2);
        $table->date('date');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('income');
}

};
