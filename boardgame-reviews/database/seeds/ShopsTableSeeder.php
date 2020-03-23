<?php

use Illuminate\Database\Seeder;
// use App\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $shop_name = array();

        // $shop_name  =[
        //     1 => 'ショップ娯楽屋　秋葉原スペース店',
        //    'ディアシュピール',
        //    'パイナップルゲームズ',
        //    '',
        // ];

        // $content = array();

        // $content  =[
        //     1 => 'テーブルを使った遊びの利用や、新しい仲間を見つける場となりえる場所として、

        //     店長と利用者みんなで秋葉原に『遊び場』を作って行こうというコンセプトショップです。

        //     自由度の高いゲームスペースになれるよう、皆様の意見をなるべく店に反映していきます！

        //     さまざまな面白サービスも考えていますので、是非遊びに来てください^^',
        //     // 2
        //    '当店「DEAR SPIELE（ディアシュピール）」は、JR東中野駅東口より徒歩1分！

        //    世界の「ボードゲーム」を1,200種類以上取り揃えたプレイ＆イベントスペースです。

        //    リーズナブルなお値段でご案内しておりますので是非お立ち寄りくださいませ。',
        //     // 3
        //     'パイナップルゲームズはJR山手線 田町駅から徒歩3分、自称都内で最もリーズナブルに遊べるボードゲームカフェです。
        //     フード&ドリンク(アルコール含)持込OKのため、プレイ代金以外は発生いたしません(๑'ᴗ'๑)',
        //     //
        //     '',
        // ];

        // $address = array();

        // $address  =[
        //     1 => '東京都千代田区外神田2-13-5　MINTRON秋葉原ビル　2F',
        //    '東京都中野区東中野4-9-1 第一元太ビル4-A/3-A',
        //    '',
        // ];

        // $boardgame_num = array();

        // $boardgame_num  =[
        //     1 => '399',
        //    '1404',
        //    '456',
        //    '',
        // ];

        // $home_url = array();

        // $home_url  =[
        //     1 => 'https://gryfreeagshop.jimdo.com',
        //    'http://www.dear-spiele.com/',
        //    'https://www.pineapple7games.com/',
        //    '',
        // ];

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // DB::table('shops')->truncate();

        // Shop::truncate();
        // for($i = 1; $i <= 2; $i++){
        //     DB::table('shops')->insert([
        //         'shop_name'         => $shop_name[$i],
        //         'content'               => $content[$i],
        //         'address'              => $address[$i],
        //         'boardgame_num' => $boardgame_num[$i],
        //         'home_url'           => $home_url[$i],
        //     ]);
        // }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('shops')->insert([
            // 1
            [
                'shop_name'           => 'ショップ娯楽屋　秋葉原スペース店',
                'address'      => '東京都千代田区外神田2-13-5　MINTRON秋葉原ビル　2F',
                'boardgame_num'          => '399',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'https://gryfreeagshop.jimdo.com/',
                'content'      => 'テーブルを使った遊びの利用や、新しい仲間を見つける場となりえる場所として、

                店長と利用者みんなで秋葉原に『遊び場』を作って行こうというコンセプトショップです。

                自由度の高いゲームスペースになれるよう、皆様の意見をなるべく店に反映していきます！

                さまざまな面白サービスも考えていますので、是非遊びに来てください^^

                '
            ],
            // 2
            [
                'shop_name'           => 'ディアシュピール',
                'address'      => '東京都中野区東中野4-9-1 第一元太ビル4-A/3-A',
                'boardgame_num'          => '1404',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'http://www.dear-spiele.com/',
                'content'      => '当店「DEAR SPIELE（ディアシュピール）」は、JR東中野駅東口より徒歩1分！

                世界の「ボードゲーム」を1,200種類以上取り揃えたプレイ＆イベントスペースです。

                リーズナブルなお値段でご案内しておりますので是非お立ち寄りくださいませ。'
            ],
            // 3
            [
                'shop_name'           => 'パイナップルゲームズ',
                'address'      => '東京都港区芝5-29-2　三善ビル8階',
                'boardgame_num'          => '456',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'https://www.pineapple7games.com/',
                'content'      => 'パイナップルゲームズはJR山手線 田町駅から徒歩3分、自称都内で最もリーズナブルに遊べるボードゲームカフェです。
                フード&ドリンク(アルコール含)持込OKのため、プレイ代金以外は発生いたしません(๑'ᴗ'๑)'
            ],
            // 4
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 5
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 6
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 7
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 8
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 9
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 10
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 11
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 12
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 13
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 14
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 15
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 16
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 17
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 18
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 19
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 20
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 21
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 22
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 23
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 24
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 25
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 26
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 27
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 28
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 29
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 30
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 31
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 32
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 33
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 34
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 35
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 36
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 37
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 38
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 39
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 40
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 41
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 42
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 43
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 44
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 45
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 46
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 47
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 48
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 49
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 50
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 51
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 52
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 53
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 54
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 55
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 56
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 57
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 58
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 59
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 60
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 61
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 62
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 63
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 64
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 65
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 66
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 67
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 68
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 69
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 70
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 71
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 72
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 73
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 74
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 75
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 76
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 77
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 78
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 79
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 80
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 81
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 82
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 83
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 84
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 85
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 86
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 87
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 88
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 89
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 90
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 91
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 92
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 93
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 94
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 95
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 96
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 97
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 98
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 99
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 100
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 101
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 102
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 103
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 104
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 105
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 106
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 107
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 108
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 109
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 110
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ],
            // 111
            [
                'shop_name'           => '',
                'address'      => '',
                'boardgame_num'          => '',
                'price' =>'',
                'byo_flg' => '',
                'home_url'       =>'',
                'content'      => ''
            ]
        ]);
    }
}
