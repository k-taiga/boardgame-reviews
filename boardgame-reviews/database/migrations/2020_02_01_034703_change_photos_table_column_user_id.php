<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePhotosTableColumnUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // カラム名変更
        Schema::table('photos', function (Blueprint $table) {
            $table->renameColumn('user_id', 'shop_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // カラム名を戻す
        Schema::table('photos', function (Blueprint $table) {
            $table->renameColumn('shop_id', 'user_id');
        });
    }
}
