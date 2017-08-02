<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_routines', function (Blueprint $table) {
            $table->dropColumn('one');
            $table->dropColumn('two');
            $table->dropColumn('three');
            $table->dropColumn('four');
            $table->dropColumn('five');
            $table->dropColumn('six');
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
