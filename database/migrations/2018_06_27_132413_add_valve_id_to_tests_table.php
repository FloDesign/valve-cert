<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValveIdToTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->integer('valve_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('valve_id');
        });
    }
}
