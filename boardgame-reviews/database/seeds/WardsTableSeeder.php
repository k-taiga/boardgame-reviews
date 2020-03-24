<?php

use Illuminate\Database\Seeder;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wards = array();
        // 配列を1から始めて添え字を合わせる
        $wards  = [
            1 => '千代田区',
            2 => '中央区',
            3 => '港区',
            4 => '新宿区',
            5 => '文京区',
            6 => '台東区',
            7 => '墨田区',
            8 => '江東区',
            9 => '品川区',
            10 => '目黒区',
            11 => '大田区',
            12 => '世田谷区',
            13 => '渋谷区',
            14 => '中野区',
            15 => '杉並区',
            16 => '豊島区',
            17 => '北区',
            18 => '荒川区',
            19 => '板橋区',
            20 => '練馬区',
            21 => '足立区',
            22 => '葛飾区',
            23 => '江戸川区',
            24 => '23区外',
        ];

        for ($i = 1; $i <= 24; $i++) {
            DB::table('mt_wards')->insert([
                'id'           => $i,
                'name'      => $wards[$i],
            ]);
        }
    }
}
