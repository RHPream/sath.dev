<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SomeOperationInLectureAndChapterModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->unsignedInteger('chapter_id');
        });
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn('lecture_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->dropColumn('chapter_id');
        });
        Schema::table('chapters', function (Blueprint $table) {
            $table->unsignedInteger('lecture_id');
        });
    }
}
