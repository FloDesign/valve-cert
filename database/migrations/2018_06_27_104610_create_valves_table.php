<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValvesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('valves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial')->nullable();
            $table->string('customer')->default('none');
            $table->string('territory')->default('none');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('valves');
    }
}
