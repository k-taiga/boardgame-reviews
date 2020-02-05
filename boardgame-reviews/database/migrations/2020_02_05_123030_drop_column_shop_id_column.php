<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnShopIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            // 外部キー制約を持ったカラムのカラム名のみ2020_02_01_034703_change_photos_table_column_user_idで修正したしまったためここでdrop
            $table->dropForeign(['user_id']);
            $table->dropColumn('shop_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->unsignedInteger('shop_id');
        });
    }
}
