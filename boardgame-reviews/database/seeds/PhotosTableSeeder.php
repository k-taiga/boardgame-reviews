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
            // ディアシュピール
            2 => 'rkHCC5OlJnO2.jpeg',
            3 => 'pineapple_games.jpg',
            4 => 'brownstone.jpg',
            5 => 'BoardGameCafeLoungeROSA.jpeg',
            6 => 'akihabara_shukaizyo.jpg',
            7 => 'ajito.jpg',
            8 => 'COCKTAIL_TOYS.jpeg',
            9 => 'Brett.jpg',
            10 => 'CRYPTOMERIA.jpg' ,
            11 => 'RoleRollStation.jpg',
            12 => 'ueno_uesama.jpg',
            13 => 'GALLERIA6.jpg',
            14 => 'CAcafe.jpg',
            15 => 'ariaketei.jpg',
            16 => 'BoardGay.jpg',
            17 => 'otyanomizu_mine.jpg',
            18 => 'boardgame_douzyou.jpeg',
            19 => 'bonuru.jpg',
            20 => 'JELLYJELLYCAFE_Shinjyuku.jpg',
            21 => 'korokorodou.jpg',
            22 => 'JELLYJELLYCAFE_Akihabara.jpeg',
            23 => 'amayadori.jpg',
            24 => 'Bookcafe_yomiyasumi.jpg',
            25 => 'TOKYO_LOCAL_BASE.png',
            26 => 'goonie_cafe.jpg',
            27 => 'kissa_akane.jpg',
            28 => 'invade.jpeg',
            29 => 'tokainaka.jpg',
            30 => '26chart.jpg',
            31 => 'chipdice.jpg',
            32 => 'JOLDEENO.jpg',
            33 => 'JELLYJELLYCAFE_Ikebukuro.jpg',
            34 => 'Eifer.jpg',
            35 => 'psaquarium.jpg',
            36 => 'FlowerKing.jpg',
            37 => 'asobibar.jpeg',
            38 => 'chipdice_Akiba.jpeg',
            39 => 'ASOBAKO.jpg',
            40 => 'REALL.jpg',
            41 => 'saikorobukuro.jpg',
            42 => 'pasera_akiba.png',
            43 => 'raporu.jpg',
            44 => 'yanaka.png',
            45 => 'tenshodo.jpg',
            46 => 'tablegamesintheworld.jpg',
            47 => 'pasera_Ikebukuro.jpg',
            48 => 'haisin_BAR.jpg',
            49 => 'tcg_bar.jpg',
            50 => 'welps_space.jpg',
            51 => 'phase_ueno.jpg',
            52 => 'BLUEPIECE.jpg',
            53 => 'CaravansBase.jpg',
            54 => 'BOA.jpg',
            55 => 'marble.jpg',
            56 => 'pasera_ueno.png',
            57 => 'pasera_honten.png',
            58 => 'ArtSpace.jpg',
            59 => 'tenganan.jpg',
            60 => 'uenouesama.jpg',
            61 => 'CAPSULE.jpg',
            62 => 'asobiya.jpg',
            63 => 'JELLYJELLYCAFE_Ikebukuro2.jpg',
            64 => 'ThirdPlace.jpg',
            65 => 'pasera_ginza.png',
            66 => 'pasera_shibuya.png',
            67 => 'kotobuki.jpg',
            68 => 'little_cave.jpg',
            69 => 'dons.jpg',
            70 => 'todo.jpg',
            71 => 'spass.jpg',
            72 => 'zinrou_mura.jpg',
            73 => 'GOTTA2CAFE.jpg',
            74 => 'little_cave_Shinjuku.jpg',
            75 => 'JELLYJELLYCAFE_Tachikawa.jpg',
            76 => 'JELLYJELLYCAFE_Suidobashi.jpg',
            77 => 'saradakan.jpg',
            78 => 'ippuku.jpg',
            79 => 'glux.jpg',
            80 => 'jinrou_shibuya.jpeg',
            81 => 'kurumari.jpg',
            82 => 'JELLYJELLYCAFE_Shibuya.jpg',
            83 => 'asobi_cafe.jpg',
            84 => 'JELLYJELLYCAFE_Shimokitazawa.jpg',
            // 85 => '',
            // 86 => '',
            // 87 => '',
            // 88 => '',
            // 89 => '',
            // 90 => '',
            // 91 => '',
            // 92 => '',
            // 93 => '',
            // 94 => '',
            // 95 => '',
            // 96 => '',
            // 97 => '',
            // 98 => '',
            // 99 => '',
            // 100 => '',
            // 101 => '',
            // 102 => '',
            // 103 => '',
            // 104 => '',
            // 105 => '',
            // 106 => '',
            // 107 => '',
            // 108 => '',
            // 109 => '',
            // 110 => '',
            // 111 => '',
        ];

        for($i = 1; $i <= 84; $i++){
            DB::table('photos')->insert([
                'id'           => $i,
                'shop_id'      => $i,
                'filename'      => $photos[$i ],
            ]);
        }
    }
}
