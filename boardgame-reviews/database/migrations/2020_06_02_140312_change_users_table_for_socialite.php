<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTableForSocialite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
          // 追加
          $table->string('provider_id')->nullable();
          $table->string('provider_name')->nullable();
          // null許容に変更
          $table->string('password')->nullable()->change();
          // idとnameをユニーク制約
          $table->unique(['provider_id', 'provider_name']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('provider_id');
        $table->dropColumn('provider_name');
        $table->string('password')->nullable(false)->change();
        $table->dropUnique(['provider_id', 'provider_name']);
      });
    }
}
