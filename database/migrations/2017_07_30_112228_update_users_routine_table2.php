<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersRoutineTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_routines', function (Blueprint $table) {
            $table->string('one')->nullable();
            $table->string('two')->nullable();
            $table->string('three')->nullable();
            $table->string('four')->nullable();
            $table->string('five')->nullable();
            $table->string('six')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_routines', function (Blueprint $table) {
            //
        });
    }
}
