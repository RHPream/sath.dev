<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cirulars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('university_id');
            $table->string('file')->default('file.type');
            $table->string('marque');
            $table->longText('description');
            $table->string('unit');
            $table->string('link');
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
        Schema::dropIfExists('cirulars');
    }
}
