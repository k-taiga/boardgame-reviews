<?php

use Illuminate\Database\Seeder;

class TruncateTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('shops')->truncate();

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
