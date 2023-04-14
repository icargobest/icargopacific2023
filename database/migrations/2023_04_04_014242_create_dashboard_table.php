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
    Schema::create('dashboard', function (Blueprint $table) {
        $table->id();
        $table->integer('accepted')->default(0);
        $table->integer('pickedup')->default(0);
        $table->integer('received')->default(0);
        $table->integer('dispatched')->default(0);
        $table->string('forwarded')->default(0);
        $table->string('delivered')->default(0);
        $table->string('confirmed')->default(0);
        $table->timestamps();
    });

    DB::table('dashboard')->insert([
        [
            'accepted' => rand(0, 200),
            'pickedup' => rand(0, 200),
            'received' => rand(0, 200),
            'dispatched' => rand(0, 200),
            'forwarded' => rand(0, 200),
            'delivered' => rand(0, 200),
            'confirmed' => rand(0, 200)
        ] 
    ]);
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard');
    }
};
