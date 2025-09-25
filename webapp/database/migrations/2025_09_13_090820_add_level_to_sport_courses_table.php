<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelToSportCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('sport_courses', function (Blueprint $table) {
            $table->integer('level')->after('name')->comment('講座レベル'); 
        });
    }

    public function down()
    {
        Schema::table('sport_courses', function (Blueprint $table) {
            $table->dropColumn('level');
        });
    }
}