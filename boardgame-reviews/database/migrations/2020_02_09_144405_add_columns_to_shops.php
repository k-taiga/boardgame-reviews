<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn('bussiness_hours');
            $table->string('boardgame_num');
            $table->string('content');
            $table->string('home_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->string('bussiness_hours');
            $table->dropColumn('boardgame_num');
            $table->dropColumn('content');
            $table->dropColumn('home_url');
        });
    }
}
