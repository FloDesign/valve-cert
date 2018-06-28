<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNotesNullableOnTestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('tests', function (Blueprint $table) {
            $table->text('notes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations{.
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->text('notes')->nullable(false)->change();
        });
    }
}
