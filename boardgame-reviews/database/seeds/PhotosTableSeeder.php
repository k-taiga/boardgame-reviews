<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Photo;


class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = array();
        // 配列を1から始めて添え字を合わせる
        $photos  =[
            1 => 'gorakuya.jpg',
           'rkHCC5OlJnO2.jpeg',
        ];

        for($i = 1; $i <= 2; $i++){
            DB::table('photos')->insert([
                'id'           => $i,
                'shop_id'      => $i,
                'filename'      => $photos[$i ],
            ]);
        }
    }
}
