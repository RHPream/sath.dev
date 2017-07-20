<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_routines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('one')->default(null);
            $table->string('two')->default(null);
            $table->string('three')->default(null);
            $table->string('four')->default(null);
            $table->string('five')->default(null);
            $table->string('six')->default(null);
            $table->string('class_id')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_routines');
    }
}
