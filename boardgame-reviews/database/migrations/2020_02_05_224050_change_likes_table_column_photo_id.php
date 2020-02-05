<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLikesTableColumnPhotoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
            // $table->dropForeign('likes_photo_id_foreign');
            // $table->dropForeign(['photo_id']);
            $table->unsignedInteger('photo_id')->change();
            $table->renameColumn('photo_id', 'shop_id');
            $table->foreign('shop_id')->references('id')->on('shops');
            // $table->foreign('photo_id')->references('id')->on('photos');
            // $table->dropForeign(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            // $table->dropForeign(['shop_id']);
            $table->renameColumn('shop_id', 'photo_id');
            // $table->string('photo_id')->change();
            // photosテーブルのidと外部制約
            // $table->foreign('photo_id')->references('id')->on('photos');
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
