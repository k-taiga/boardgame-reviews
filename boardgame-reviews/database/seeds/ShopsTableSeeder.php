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

        DB::table('shops')->insert([
            // 1
            [
                'shop_name'           => 'ショップ娯楽屋　秋葉原スペース店',
                'address'      => '東京都千代田区外神田2-13-5　MINTRON秋葉原ビル　2F',
                'ward_id' => '1',
                'boardgame_num'          => '399',
                'price' =>'1800',
                'byo_flg' => '1',
                'home_url'       =>'https://gryfreeagshop.jimdo.com/',
                'content'      => 'テーブルを使った遊びの利用や、新しい仲間を見つける場となりえる場所として、
                店長と利用者みんなで秋葉原に『遊び場』を作って行こうというコンセプトショップです。
                自由度の高いゲームスペースになれるよう、皆様の意見をなるべく店に反映していきます！
                さまざまな面白サービスも考えていますので、是非遊びに来てください^^
                ',
           ],
            // 2
            [
                'shop_name'           => 'ディアシュピール',
                'address'      => '東京都中野区東中野4-9-1 第一元太ビル4-A/3-A',
                'ward_id' => '14',
                'boardgame_num'          => '1404',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'http://www.dear-spiele.com/',
                'content'      => '当店「DEAR SPIELE（ディアシュピール）」は、JR東中野駅東口より徒歩1分！
                世界の「ボードゲーム」を1,200種類以上取り揃えたプレイ＆イベントスペースです。
                リーズナブルなお値段でご案内しておりますので是非お立ち寄りくださいませ。',
           ],
            // 3
            [
                'shop_name'           => 'パイナップルゲームズ',
                'address'      => '東京都港区芝5-29-2　三善ビル8階',
                'boardgame_num'          => '456',
                'ward_id' => '3',
                'price' =>'1000',
                'byo_flg' => '1',
                'home_url'       =>'https://www.pineapple7games.com/',
                'content'      => 'パイナップルゲームズはJR山手線 田町駅から徒歩3分、自称都内で最もリーズナブルに遊べるボードゲームカフェです。
                フード&ドリンク(アルコール含)持込OKのため、プレイ代金以外は発生いたしません',
           ],
            // 4
            [
                'shop_name'           => 'ボードゲーム & カフェ　Cafe Brownstone　（カフェブラウンストーン）',
                'address'      => '東京都目黒区東山1-4-13 2F',
                'ward_id' => '10',
                'boardgame_num'          => '234',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://www.cafebrownstone.com/',
                'content'      => '中目黒駅徒歩約7分の大人が楽しめる隠れ家的なボードゲームカフェです。落ち着いた空間でゆっくりとボードゲームをお楽しみいただけます。
                営業時間　平日18時～23時　土、日、祝日　12時～23時
                平日はお1人様大歓迎！！',
           ],
            // 5
            [
                'shop_name'           => 'Board Game Cafe Lounge ROSA',
                'address'      => '東京都豊島区西池袋1-37-12',
                'ward_id' => '16',
                'boardgame_num'          => '242',
                'price' =>'1800',
                'byo_flg' => '0',
                'home_url'       =>'http://rosadeboardgame.com/',
                'content'      => '池袋駅西口徒歩1分　 総合アミューズメント施設ロサ会館の屋上階のBoard Game Cafe Lounge ROSAの情報を発信する為のアカウントです！フォローに関しましてはお会いしたことのあるゲーム関係者様のみにさせて頂きますm(_ _)m',
           ],
            // 6
            [
                'shop_name'           => 'ゲームカフェ秋葉原集会所',
                'address'      => '東京都千代田区外神田3-8-5 イサミヤ第2ビル3F',
                'ward_id' => '1',
                'boardgame_num'          => '546',
                'price' =>'1300',
                'byo_flg' => '1',
                'home_url'       =>'http://www.shukaijo.com/',
                'content'      => '秋葉原徒歩10分、末広町徒歩2分。フリードリンク＆飲食ゲーム持込み自由。ボードゲームだけでなくモンハンからTCGまで何でも遊べるゲームカフェです。お1人でも皆と遊べる乱入プレイがオススメです',
           ],
            // 7
            [
                'shop_name'           => 'Ajito ～board game party～',
                'address'      => '東京都渋谷区恵比寿1丁目26-17 阿部ビル 4F',
                'ward_id' => '13',
                'boardgame_num'          => '356',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'http://www.ajito-party.jp/',
                'content'      => '恵比寿駅徒歩8分！月～木13～23時、金土日祝13～18時ボードゲームカフェ営業中！予約不要！1500円ワンドリンク付き！お気軽に遊びに来てください♪',
           ],
            // 8
            [
                'shop_name'           => 'COCKTAIL TOYS',
                'address'      => '東京都杉並区高円寺南2-37-23 NKビルB1',
                'ward_id' => '15',
                'boardgame_num'          => '69',
                'price' =>'2500',
                'byo_flg' => '0',
                'home_url'       =>'',
                'content'      => '1人で来てもみんなでお酒を飲みながらボードゲーム、アーケード筐体、おもちゃで遊べる 【大人のための子ども部屋、 カクテルトイズ】内装イメージは海外の子ども部屋 ゲーム初心者さんが楽しめるライトなお店です',
           ],
            // 9
            [
                'shop_name'           => 'Brett',
                'address'      => '東京都小金井市本町3-8-10 グランコートB1F102',
                'ward_id' => '24',
                'boardgame_num'          => '634',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://www.brett.jp/',
                'content'      => '武蔵小金井にて13時00分～23時00分で営業 平日は1時間300円、休日は1時間500円で遊べます',
           ],
            // 10
            [
                'shop_name'           => 'クリプトメリア自由が丘店',
                'address'      => '東京都世田谷区奥沢5-28-15昇栄ビル304',
                'ward_id' => '12',
                'boardgame_num'          => '310',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://www.cryptomeria-ww.com/',
                'content'      => '自由が丘駅から徒歩約２分の立地にあるクリプトメリア自由が丘店です。
                クリプトメリアとはラテン語で『隠れた財産』という意味です。
                ”考える力を養うクリプトメリア”をキャッチコピーに
                未就学児のひらめきキッズ教室、小学生限定の思考力を鍛えるボードゲーム教室をはじめ
                教育関係者や親御さまへのセミナー、ワークショップ、そして自由が丘店によるボードゲーム販売、遊べるボードゲームスペースと、ボードゲームをメインに事業を行っております。',
           ],
            // 11
            [
                'shop_name'           => 'Role & Roll Station 秋葉原店',
                'address'      => '東京都千代田区外神田3-14-9 第26東ビル6F',
                'ward_id' => '1',
                'boardgame_num'          => '378',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'http://www.arclight.co.jp/r_r_s/',
                'content'      => '「Role&Roll Station」は、テーブルトークRPG のサポート書籍
                『Role&Roll』直営のアナログゲーム専門店です。テーブルトークRPGや
                ボードゲームなど多数のアナログゲームを取り揃えています。
                また、「プレイルーム」では、ゲームプレイ用の卓を6卓備えています。
                ぜひ一度ご来店ください。',
           ],
            // 12
            [
                'shop_name'           => '上野上さま',
                'address'      => '東京都台東区上野1-2-5黒門町ビル205',
                'ward_id' => '6',
                'boardgame_num'          => '854',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://ueno.uesama.games/',
                'content'      => 'ボードゲーム1,000種類以上&麻雀で遊べる #ボードゲーム カフェ /ヒルナンデスで紹介されました。
                秋葉原 湯島 末広町 上野御徒町も近い！',
           ],
            // 13
            [
                'shop_name'           => 'GALLERIA6',
                'address'      => '東京都目黒区青葉台２－１６－４ 白金ビル１F',
                'ward_id' => '10',
                'boardgame_num'          => '45',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'https://galleriasix.com/',
                'content'      => '中目黒駅から徒歩8分！2019年3月に中目黒の閑静な住宅街にオープンしたボードゲームをコンセプトにしたバー。 40種類以上のボードゲームを常設しており、オリジナルゲームもご用意しています。',
            ],
            // 14
            [
                'shop_name'           => 'C＆A Cafe',
                'address'      => '東京都墨田区江東橋4-13-6夕月ビル101',
                'ward_id' => '7',
                'boardgame_num'          => '232',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://www.candagames.com/',
                'content'      => '錦糸町にてアナログゲームカフェ「C＆A Cafe」を営業中！
                ボードゲーム、体験型脱出ゲーム、謎解き、麻雀で遊べる店になります。
                火曜以外の11:00~23:00に営業中♪
                お1人様から大人数様まで、皆様のご来店お待ちしております',
            ],
            // 15
            [
                'shop_name'           => '有明亭',
                'address'      => '東京都豊島区巣鴨1-20-13',
                'ward_id' => '16',
                'boardgame_num'          => '197',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'https://ariaketei.com/',
                'content'      => 'スパイスカレーと挽きたてコーヒー ボードゲームカフェ【有明亭】です！JR巣鴨駅から徒歩4分、「おいしい・かわいい・おもしろい」をモットーに居心地のいいお店を目指します！ 飲食のみでのご利用もお気軽にどうぞ',
            ],
            // 16
            [
                'shop_name'           => 'BoardGay.mBar秘密基地',
                'address'      => '東京都新宿区西新宿7-19-22ダイカンプラザシティ104',
                'ward_id' => '4',
                'boardgame_num'          => '423',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'https://himitsukichiinfoma.wixsite.com/terkeipe',
                'content'      => '安くて楽しいがモットーなボドゲイバー★定休日:月(祝前、祝日は営業)/詳しい料金、席数はHPを確認下さい！Tel:0369089710/店内状況確認・ご予約は気軽にDMかTelを☆(予約状況はモーメントのTimetreeからご確認頂けます！',
            ],
            // 17
            [
                'shop_name'           => '御茶ノ水マイン',
                'address'      => '東京都千代田区外神田2丁目1-5外神田会館101',
                'ward_id' => '1',
                'boardgame_num'          => '17',
                'price' =>'500',
                'byo_flg' => '1',
                'home_url'       =>'http://ocha-mine.com/',
                'content'      => 'お茶の水にあるイベントスペース【御茶ノ水マイン】です。
                JR「御茶ノ水駅」聖橋口より徒歩5分
                JR「秋葉原駅」電気街口より徒歩8分
                ボードゲーム会や各種イベントでのご利用をお待ちしております！',
            ],
            // 18
            [
                'shop_name'           => 'ボードゲーム道場',
                'address'      => '東京都中野区中野１−５５−２　パレス中村ⅡB１',
                'ward_id' => '14',
                'boardgame_num'          => '280',
                'price' =>'1000',
                'byo_flg' => '0',
                'home_url'       =>'https://kinyannkai.wordpress.com/',
                'content'      => 'このボードゲーム道場は、完全予約制の25〜30名がご利用頂けるスペースとなっております！ボードゲームは200種類程度をご用意させて頂いております。スポンジマットにちゃぶ台というレトロなスタイルで、まったりして頂くも良し、ガッツリ合宿を張って頂く事も可能です＾＾b',
            ],
            // 19
            [
                'shop_name'           => 'ぼぬーる',
                'address'      => '東京都杉並区阿佐ヶ谷南１－３３－５　veris build ３Ｆ',
                'ward_id' => '15',
                'boardgame_num'          => '140',
                'price' =>'1300',
                'byo_flg' => '1',
                'home_url'       =>'http://bonheur-asagaya.com/',
                'content'      => '阿佐ヶ谷のパールセンター街で営業中！ゲームの持ち込み・見学も歓迎！
                お一人様からでも気軽にどうぞ♪',
            ],
            // 20
            [
                'shop_name'           => 'JELLY JELLY CAFE 新宿店',
                'address'      => ' 東京都渋谷区代々木2-15-9 加瀬ビル302',
                'ward_id' => '13',
                'boardgame_num'          => '529',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://jellyjellycafe.com/shoplist/shinjuku',
                'content'      => 'JELLY JELLY CAFE新宿店は、大人から子どもまで楽しめるボードゲームカフェです。カップルや、サークル仲間、仕事仲間とお酒を片手に楽しい時間を過ごしてみませんか？',
            ],
            // 21
            [
                'shop_name'           => 'コロコロ堂',
                'address'      => '東京都台東区上野1-9-3 日向ビル1階',
                'ward_id' => '6',
                'boardgame_num'          => '580',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'http://korokorodou.com/',
                'content'      => '上野・御徒町・湯島エリアにある、世界のボードゲームで楽しめるカフェです。
                置いてあるゲームは数種類！店員がルールを丁寧に教えてくれるので、「ボードゲームって何？人生ゲームしか知らないんだけど…」なんて人でも安心して楽しめます。
                お酒やコーヒー片手に、まったり・わいわい遊んでみませんか？
                どなたでもお気軽にお越しください！',],
            // 22
            [
                'shop_name'           => 'JELLY JELLY CAFE 秋葉原店',
                'address'      => '東京都千代田区神田佐久間町3-37-23由良ビル1F-B',
                'ward_id' => '1',
                'boardgame_num'          => '275',
                'price' =>'1800',
                'byo_flg' => '1',
                'home_url'       =>'https://jellyjellycafe.com/shoplist/akihabara',
                'content'      => 'ELLY JELLY CAFEがついに秋葉原に！ お酒を片手に、秋葉原駅から徒歩2分。
                カップルやお友達、お仕事仲間と、新しいエンターテイメントを体験してみませんか？',],
            // 23
            [
                'shop_name'           => 'あまやどり',
                'address'      => '東京都台東区上野5-25-17東成ビル5階',
                'ward_id' => '6',
                'boardgame_num'          => '323',
                'price' =>'1200',
                'byo_flg' => '0',
                'home_url'       =>'',
                'content'      => 'ボードゲームカフェ【あまやどり】です。 2020年1月18日(土)オープン！JR山手線御徒町駅南口から徒歩2分！ 営業時間13:00〜23:00【水曜のみ18:00〜】定休日なし',],
            // 24
            [
                'shop_name'           => 'BookCafe ヨミヤスミ',
                'address'      => '東京都調布市多摩川3-68-1',
                'ward_id' => '24',
                'boardgame_num'          => '23',
                'price' =>'1000',
                'byo_flg' => '0',
                'home_url'       =>'https://yomiyasumi.tumblr.com/',
                'content'      => '京王線、京王多摩川駅から徒歩6分の小さなブックカフェです。
                80～90年代の本や雑誌を中心に、漫画、パソコン雑誌、懐かしいゲームブックが少し多めにあります。
                また、カウンター席には電源、店内はフリーWi-FiになっておりますのでノートPCやタブレットを使ったお仕事や勉強（自習）等でもご利用いいただけます。',],
            // 25
            [
                'shop_name'           => 'TOKYO L.O.C.A.L. BASE',
                'address'      => ' 東京都荒川区町屋1ー3ー12',
                'ward_id' => '18',
                'boardgame_num'          => '21',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://tokyolocal.me/',
                'content'      => '東京都荒川区町屋で営業しているカフェダイナー
                TOKYO L.O.C.A.L BASEです！
                毎月最終火曜日にボードゲームイベントを開催中！
                ボードゲームイベントだけでなく色々なイベントを開催しています！',],
            // 26
            [
                'shop_name'           => 'goonie cafe',
                'address'      => '東京都練馬区小竹町1-58-1 東京第6ビル2F',
                'ward_id' => '20',
                'boardgame_num'          => '317',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://gooniecafe.com/',
                'content'      => '西武池袋線江古田駅北口徒歩30秒、世界のボードゲームで遊べるお店「 goonie cafe（グーニーカフェ）」です' ,],
            // 27
            [
                'shop_name'           => '喫茶あかね',
                'address'      => '東京都台東区浅草7-6-5',
                'ward_id' => '6',
                'boardgame_num'          => '152',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'http://cafeakane.favy.jp/',
                'content'      => '浅草で、創業から43年になる喫茶店。
                約1,000冊のコミックと書籍類や、誰でも楽しめるボードゲームなどがあります。
                浅草で初のボードゲーム喫茶です！
                グループでも、一人でも楽しめる空間ですので、店内（0338736406）にどうぞ(^O^)',],
            // 28
            [
                'shop_name'           => 'インベード.',
                'address'      => '東京都杉並区西荻北3-32-11',
                'ward_id' => '15',
                'boardgame_num'          => '195',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://www.invade-design.com/',
                'content'      => '西荻窪のボードゲーム×デザインのお店。 美味しいお茶と珈琲を飲みながらボードゲームが遊べるよ。平日15:00-23:00 土日祝日13:00-23:00 水曜定休 ご予約は080-9202-4934かHPからweb予約できます。ボードゲーム制作もしてます。デザインの相談・制作もしてます。
                ',],
            // 29
            [
                'shop_name'           => 'とかいなかボードゲーム部',
                'address'      => '東京都品川区西五反田5-13-8-1F',
                'ward_id' => '9',
                'boardgame_num'          => '75',
                'price' =>'1000',
                'byo_flg' => '1',
                'home_url'       =>'https://tokainaka.altalk.com/',
                'content'      => '不動前駅（目黒駅の隣）から徒歩3分
                とかいなか食堂でボードゲーム会を開催
                ご用意したボードゲームは時間内どれでも遊び放題、持ち込みも歓迎です',],
            // 30
            [
                'shop_name'           => 'フローチャート',
                'address'      => '東京都中野区新井1－14－1 シェ・ユミビルB1Ｆ',
                'ward_id' => '14',
                'boardgame_num'          => '199',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'https://flow-chart.net/',
                'content'      => '中野のボードゲーム・フローチャートでは美味しい料理やお酒、楽しいイベントなどの開催などのサービスを行っていますが、なによりもお客様に満足して帰っていただくことを望んでいます。
                そのためどのような方でも楽しめる空間の提供を心掛けています。',],
            // 31
            [
                'shop_name'           => 'チップアンドダイス錦糸町店',
                'address'      => '東京都墨田区江東橋4-16-4',
                'ward_id' => '7',
                'boardgame_num'          => '122',
                'price' =>'1300',
                'byo_flg' => '0',
                'home_url'       =>'https://chipanddice.owst.jp/',
                'content'      => '「ボードゲームサイト・チップ&ダイス」のコラボ店 『チップアンドダイス錦糸町店』です',],
            // 32
            [
                'shop_name'           => 'JOLDEENO',
                'address'      => '東京都立川市立川市錦町2-1-8 グリーンビル2階',
                'ward_id' => '24',
                'boardgame_num'          => '238',
                'price' =>'2000',
                'byo_flg' => '1',
                'home_url'       =>'https://joldeeno.com/',
                'content'      => '立川駅から徒歩5分。本格的なアンティーク空間の中で、人狼や様々なボードゲームを初心者、お子様問わずお楽しみいただけます。',],
            // 33
            [
                'shop_name'           => 'JELLY JELLY CAFE 池袋2号店',
                'address'      => '東京都豊島区池袋2-12-9 広瀬ビル3F',
                'ward_id' => '6',
                'boardgame_num'          => '570',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://jellyjellycafe.com/shoplist/ikebukuro2',
                'content'      => '池袋に2店舗目のJELLY JELLY CAFE（ボードゲームカフェ）が誕生しました！無垢の木材に囲まれた広々とした店内で、ゆったりとした時間をお過ごしいただけます。オシャレに楽しくボードゲームを遊んでみませんか？',],
            // 34
            [
                'shop_name'           => 'GameCafe&Bar Eifer蒲田',
                'address'      => '東京都大田区大田区蒲田4-29-1　楓葵ビル6階',
                'ward_id' => '11',
                'boardgame_num'          => '427',
                'price' =>'2500',
                'byo_flg' => '1',
                'home_url'       =>'https://gb-eifer.com//',
                'content'      => '蒲田のゲームバーです！営業時間は18時〜。毎月ポーカー、人狼イベント開催！20時までにご来店でチャージサービス。飲み放題3時間2500円もあります！お一人様、お酒の苦手な方大歓迎！ゲーム初心者大歓迎！ ',],
            // 35
            [
                'shop_name'           => 'プレイスペースあくありうむ',
                'address'      => '東京都北区赤羽2-20-10',
                'ward_id' => '17',
                'boardgame_num'          => '0',
                'price' =>'2000',
                'byo_flg' => '1',
                'home_url'       =>'https://twitter.com/psaquarium',
                'content'      => '赤羽にて主にアナログゲームのプレイスペースを開いております。',],
            // 36
            [
                'shop_name'           => 'Flower-King　FLOWER GARDEN　恵比寿コワーキングスペース',
                'address'      => '東京都渋谷区恵比寿1-16-29デリス第2ビル4F',
                'ward_id' => '13',
                'boardgame_num'          => '51',
                'price' =>'1650',
                'byo_flg' => '1',
                'home_url'       =>'https://www.flower-ebisu.tokyo/',
                'content'      => '恵比寿駅徒歩３分のボードゲームも置いているコワーキングスペースです。 平日10時~18時30分まで、1100円でスペースをご利用いただけます！ コーヒー・紅茶は飲み放題！',],
            // 37
            [
                'shop_name'           => 'あそびBARにゃるた商会',
                'address'      => ' 東京都北区志茂2-52-6',
                'ward_id' => '17',
                'boardgame_num'          => '262',
                'price' =>'2000',
                'byo_flg' => '1',
                'home_url'       =>'http://blog.livedoor.jp/asobibarnrts',
                'content'      => '東京赤羽のあそびBARにゃるた商会です。ボードゲームや携帯ゲーム等で遊びながらお酒を飲もう！をコンセプトとしたお店です。よろしくお願いいたします',],
            // 38
            [
                'shop_name'           => '秋葉原ボードゲームスペース『チップ＆ダイス』',
                'address'      => '東京都千代田区神田佐久間町3-21-2',
                'ward_id' => '1',
                'boardgame_num'          => '864',
                'price' =>'1200',
                'byo_flg' => '1',
                'home_url'       =>'https://akiba-tipanddice.com/',
                'content'      => 'ボードゲームサイト・チップ&ダイス」のコラボ店 『秋葉原チップアンドダイス』です',],
            // 39
            [
                'shop_name'           => 'ASOBAKO',
                'address'      => ' 東京都豊島区巣鴨3-28-7 大木ビル3階',
                'ward_id' => '16',
                'boardgame_num'          => '258',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://www.asobako.com/',
                'content'      => 'ＪＲ巣鴨駅から徒歩２分！都営三田線 巣鴨駅 A2出口から徒歩1分！ ゆったりとした店内で思う存分アナログゲームをやりませんか？ ボードゲームが初めての方でも店員がおすすめを選び、説明します！',],
            // 40
            [
                'shop_name'           => '神楽坂ボードゲームカフェ RE:ALL',
                'address'      => '東京都新宿区天神町68-3橋本ビル2F',
                'ward_id' => '4',
                'boardgame_num'          => '401',
                'price' =>'1600',
                'byo_flg' => '1',
                'home_url'       =>'https://www.reall.tokyo/',
                'content'      => '世界中のボードゲームを時間制で遊べるcafébarです。
                冷静さと集中力を生み出す青を基調とした店内となっております。
                入り口のドアを開けると、ボードゲームを敷き詰めた意匠壁がお迎え致します
                二次会・貸し切り・お一人様・ボードゲーム未経験の方、大歓迎しております。',],
            // 41
            [
                'shop_name'           => 'サイコロブクロ',
                'address'      => '東京都豊島区東池袋1-40-10 川又ビル4F',
                'ward_id' => '16',
                'boardgame_num' => '310',
                'price' =>'1800',
                'byo_flg' => '1',
                'home_url'       =>'http://saikorobukuro.com/',
                'content'      => '池袋東口徒歩5分圏内のボードゲームスペース&カフェです。
                ゆったりと楽しくボードゲームをプレイできる店舗を目指しております。',],
            // 42
            [
                'shop_name'           => 'パセラリゾーツＡＫＩＢＡマルチエンターテインメント',
                'address'      => '東京都千代田区外神田１丁目１−１０ パセラリゾーツＡＫＩＢＡマルチエンターテインメント',
                'ward_id' => '1',
                'boardgame_num'          => '209',
                'price' =>'2800',
                'byo_flg' => '0',
                'home_url'       =>'https://www.pasela.co.jp/shop/akiba_multi/',
                'content'      => '秋葉原駅徒歩3分のバリ風リゾート・カラオケパセラAKIBAマルチエンターテインメント。ギネス申請中！曲数世界最強のカラオケと、お味保証ありの美食メニューをお楽しみいただける、癒しのリゾート空間です。',],
            // 43
            [
                'shop_name'           => 'ボードゲームカフェ らぽる',
                'address'      => '東京都八王子市明神町4ー2ー10京王八王子駅前ビル5階（',
                'ward_id' => '24',
                'boardgame_num'          => '360',
                'price' =>'2000',
                'byo_flg' => '1',
                'home_url'       =>'https://raporu-bgc.com/',
                'content'      => 'JR八王子駅から徒歩7分。ボードゲームカフェらぽるでは世界中にある様々なボードゲームを遊ぶことできます。ボードゲームを遊んだことない人でもルール説明やおすすめゲームの紹介するので気軽に来てください。1人で来ても店員や他のお客さんと一緒に遊べます。',],
            // 44
            [
                'shop_name'           => '谷中のアソビ場',
                'address'      => '東京都台東区谷中3-8-9',
                'ward_id' => '6',
                'boardgame_num'          => '130',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'http://yanaka-asobiba.com/',
                'content'      => '日暮里駅から徒歩6分、千駄木駅から徒歩3分にあるボードゲームカフェ「谷中のアソビ場」です。ドリンクバー完備で色んな駄菓子も食べられます。',],
            // 45
            [
                'shop_name'           => '天晶堂',
                'address'      => '東京都足立区千住2-28 カシェット2F',
                'ward_id' => '21',
                'boardgame_num'          => '204',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'https://tenshodogame.wixsite.com/website',
                'content'      => '北千住西口から徒歩4分のボードゲームショップ＆プレイスペース。TSUTAYAさんの裏手にある建物の2Fにあります。30代の女性店長が1人できままにやっている個人店です。お気軽に遊びに来てください！ 営業時間:11時〜19時。定休日:月曜・火曜。2019年2月2日にオープン。
                ',],
            // 46
            [
                'shop_name'           => 'ボードゲームステーション蒲田店',
                'address'      => '東京都大田区西蒲田７丁目４９−１０ ナヲミビル2階',
                'ward_id' => '11',
                'boardgame_num'          => '241',
                'price' =>'500',
                'byo_flg' => '1',
                'home_url'       =>'https://www.bg-st.net/',
                'content'      => 'ボードゲームステーションへようこそ！
                当店では500種を超えるボードゲームを常時取り揃えております！お探しの物がございましたらまず当店へ！',],
            // 47
            [
                'shop_name'           => 'パセラリゾーツ池袋西口店',
                'address'      => '東京都豊島区池袋2-40-1',
                'ward_id' => '6',
                'boardgame_num'          => '34',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'https://www.pasela.co.jp/shop/ikebukuro_nishiguchi/karaoke/',
                'content'      => 'カラオケパセラ池袋西口店は、カラオケは勿論のこと、
                パーティーや二次会、お食事やオフ会にもおすすめのバリ風リゾート空間です。',],
            // 48
            [
                'shop_name'           => 'TCG/ボードゲームカフェ　スターダスト＠旧配信BAR',
                'address'      => '東京都江東区東陽３丁目５-11東陽ファーストビル301',
                'ward_id' => '8',
                'boardgame_num'          => '42',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'',
                'content'      => 'カードゲームとボードゲームをやっています。オタク話も歓迎！お一人様でも大歓迎！木場駅徒歩4分。東陽町徒歩6分。平日17:00〜00:00 土日15:00〜00:00定休日：火曜日',],
            // 49
            [
                'shop_name'           => 'TCG/BOARD GAME Cafe & Bar FUN',
                'address'      => '東京都台東区上野5-23-8　八重垣ビル地下1階',
                'ward_id' => '6',
                'boardgame_num'          => '18',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'https://tritry.jimdofree.com/',
                'content'      => 'おとなだってあそびたい！」
                社会で働く大人な皆さまが、気軽に、気兼ねなくTCG（トレー―ディングカードゲーム）を楽しむ空間を作り出したい。
                仕事帰りにちょっと立ち寄ったり、共通の趣味を持つ同世代との出会いの場に、我が子と落ち着いてカードゲームを楽しむ場に。子ども心を忘れぬ大人な皆さまのニーズにお応えいたします。',],
            // 50
            [
                'shop_name'           => 'ウェルプススペース',
                'address'      => '東京都千代田区神田錦町3-22-8 小笠原ビル3F',
                'ward_id' => '1',
                'boardgame_num'          => '50',
                'price' =>'500',
                'byo_flg' => '1',
                'home_url'       =>'https://welps.jp/space/',
                'content'      => '「welps space（ウェルプス　スペース）」は東京都千代田区神保町にある、レンタルスペースです。
                ボードゲーム、TRPG、TCG、携帯ゲーム、雑談など、ボードゲームカフェと比較して半額程度の料金で自由に遊べます。',],
            // 51
            [
                'shop_name'           => '貸会議室 Phase上野',
                'address'      => '東京都台東区東上野2-12-9 マスダビル2F',
                'ward_id' => '6',
                'boardgame_num'          => '76',
                'price' =>'1000',
                'byo_flg' => '1',
                'home_url'       =>'https://www.spacee.jp/listings/13141?listing_search_log_id=15266441&neighborhood=%E4%B8%8A%E9%87%8E&neighborhood_word=%E4%B8%8A%E9%87%8E&prefecture=tokyo',
                'content'      => '山手線「上野駅」より徒歩4分♪
                駅からも近く、初めての方でも安心してご利用頂ける会議室です！
                《少人数でのセミナーや勉強会、打ち合わせやオフ会などにピッタリです》
                清潔感のある内装で快適な時間を過ごしていただけます。',],
            // 52
            [
                'shop_name'           => 'GameCafe&Bar BLUE PIECE',
                'address'      => '東京都新宿区荒木町16-16　ベルウッドビル2F',
                'ward_id' => '4',
                'boardgame_num'          => '299',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'https://bluepiece.tokyo/',
                'content'      => '都営新宿線「曙橋駅」から徒歩2分の場所にあるゲームCafe＆Barです。TCGやボドゲをゆったりと楽しみましょう！',],
            // 53
            [
                'shop_name'           => 'Caravans Base（きゃらべ）',
                'address'      => '東京都武蔵野市吉祥寺本町2-7-13レディーバードビル302（',
                'ward_id' => '24',
                'boardgame_num'          => '469',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'http://caravansbase.com/',
                'content'      => '吉祥寺のボードゲームカフェ「Caravans Base」は、世界中のボードゲームと素敵な遊び人が出会い、繋がる、みんなの秘密基地です。相席、お一人様大歓迎！',],
            // 54
            [
                'shop_name'           => 'アミューズメントバーBOA',
                'address'      => '東京都八王子市横山町9-19セイシンビル8F',
                'ward_id' => '24',
                'boardgame_num'          => '23',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'https://www.instagram.com/amusementbar_boa/',
                'content'      => '定番～海外ボードゲーム、ダーツ、カラオケ、お酒とゲームが朝まで楽しめる！
                初心者、女性、お一人様、団体様まで、どなたでもお気軽に楽しんで頂けるよう営業中です',],
            // 55
            [
                'shop_name'           => '喫茶マーブル',
                'address'      => '東京都品川区南品川5-9-19',
                'ward_id' => '9',
                'boardgame_num'          => '88',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'http://www.hos.to/cafe-marble/bg/',
                'content'      => '大井町駅から徒歩8分、ゼームス坂の途中にある、喫茶店「喫茶マーブル」で、大人が楽しめる ボードゲーム会を開催しています！
                ゲームの合間に、美味しいコーヒーと趣味の会話を楽しみたい方、ぜひお気軽に遊びにきてくださいね。お夕食には特製のハヤシライスや赤ワイン煮込みカレーをご用意しています。こちらもお楽しみに♪',],
            // 56
            [
                'shop_name'           => 'パセラリゾーツ上野公園前店',
                'address'      => '東京都台東区上野2-14-30パセラリゾーツ上野公園前店４階',
                'ward_id' => '6',
                'boardgame_num'          => '85',
                'price' =>'2800',
                'byo_flg' => '0',
                'home_url'       =>'https://www.pasela.co.jp/shop/ueno/karaoke/',
                'content'      => 'カラオケパセラ上野公園前店は、カラオケは勿論のこと、
                パーティーや二次会、お食事やオフ会にもおすすめのバリ風リゾート空間です。
                系列レストランのノウハウ（技術・食材・レシピ）をそのままに活かした 本格多国籍料理と女性に大人気の名物ハニートースト、
                そして豊富な種類のドリンクを味わいながら曲数世界一を誇るパセラ自慢のオリジナルカラオケをお楽しみください。',],
            // 57
            [
                'shop_name'           => 'パセラリゾーツ池袋本店',
                'address'      => '東京都豊島区西池袋1-21-9',
                'ward_id' => '16',
                'boardgame_num'          => '49',
                'price' =>'3000',
                'byo_flg' => '0',
                'home_url'       =>'https://www.pasela.co.jp/shop/ikebukuro/',
                'content'      => 'カラオケパセラ池袋本店は、カラオケは勿論のこと、
                パーティーや二次会、お食事やオフ会にもおすすめのバリ風リゾート空間です。
                系列レストランのノウハウ（技術・食材・レシピ）をそのままに活かした 本格多国籍料理と女性に大人気の名物ハニートースト、
                そして豊富な種類のドリンクを味わいながら曲数世界一を誇るパセラ自慢のオリジナルカラオケをお楽しみください。',],
            // 58
            [
                'shop_name'           => 'Art Space EiN PROSiT!!',
                'address'      => '東京都豊島区南大塚3-2-11 Kビル1F',
                'ward_id' => '16',
                'boardgame_num'          => '175',
                'price' =>'1000',
                'byo_flg' => '1',
                'home_url'       =>'https://einprosit2019.wixsite.com/einp',
                'content'      => 'EiNPROSiTがイベントスペースとして生まれ変わりました！
                ボードゲームはもちろんのこと、音楽スタジオとしても使えます。',],
            // 59
            [
                'shop_name'           => 'ボードゲーム喫茶 天岩庵',
                'address'      => '東京都品川区南品川5-3-30 TKビル 2階',
                'ward_id' => '9',
                'boardgame_num'          => '325',
                'price' =>'2500',
                'byo_flg' => '0',
                'home_url'       =>'https://tengan-an-boardgame-shinagawa.blogspot.com/',
                'content'      =>
                '当店のコンセプトは、「品川の隠れ家ボドゲ喫茶」「居心地の良さは自宅並」で、
                1.ボードゲーマーにやさしい広いテーブル、充実のサプライ
                2.何時間でもゲームしていられる料金と居心地
                3.ご飯と飲み物がおいしいカフェ
                となっております。',],
            // 60
            [
                'shop_name'           => '国分寺上さま',
                'address'      => '東京都国分寺市本町２丁目11-5 矢野ビル２階',
                'ward_id' => '24',
                'boardgame_num'          => '352',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://kokubunji.uesama.games/',
                'content'      => '約350種類の世界中のボードゲーム・カードゲームなどをお楽しみいただけます。
                毎週行われるゲーム会や、子供でも遊べるボードゲームもありますので、お気軽にご来店ください。',],
            // 61
            [
                'shop_name'           => 'Game & Music Bar CAPSULE',
                'address'      => '東京都町田市中町1-16-11',
                'ward_id' => '24',
                'boardgame_num'          => '257',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'http://machidacapsule.com/',
                'content'      => '小田急町田駅北口から徒歩3分！TVモニタ、プロジェクタ、CDJ、ボドゲ200種超、WiFi環境完備！美味しいお酒を楽しみながら、ゲームや音楽の話題を中心に、様々なサブカルチャーについて語り遊べるBAR',],
            // 62
            [
                'shop_name'           => 'ボードゲームカフェ　遊び舎',
                'address'      => '東京都葛飾区立石4-26-11',
                'ward_id' => '22',
                'boardgame_num'          => '0',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://tateishiasobiya.wixsite.com/asobiya',
                'content'      => '京成立石駅から徒歩１分。Books-U(古本屋)の３階にあるボードゲームカフェです。
                お一人様､初心者様大歓迎!',],
            // 63
            [
                'shop_name'           => 'JELLY JELLY CAFE 池袋店２号店',
                'address'      => '東京都豊島区西池袋3-27-16 広瀬ビル2 4F',
                'ward_id' => '16',
                'boardgame_num'          => '414',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://jellyjellycafe.com/shoplist/ikebukuro2',
                'content'      => '池袋に2店舗目のJELLY JELLY CAFE（ボードゲームカフェ）が誕生しました！無垢の木材に囲まれた広々とした店内で、ゆったりとした時間をお過ごしいただけます。オシャレに楽しくボードゲームを遊んでみませんか？',],
            // 64
            [
                'shop_name'           => 'ボードゲームスペース THIRD PLACE　秋葉原',
                'address'      => '東京都千代田区外神田 3-7-14 MYビル2F',
                'ward_id' => '1',
                'boardgame_num'          => '90',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'3rdplace.fun',
                'content'      => '『Third Place秋葉原』は、ボードゲーム＆アナログゲームファンの集う小さな場所（Place)。お気に入りのMyスペースになってほしいと『サードプレイス』と名付けました。
                落ち着いた空間で心ゆくまでいろんなゲームを楽しんでくださいね。',],
            // 65
            [
                'shop_name'           => 'パセラリゾーツ銀座店',
                'address'      => '東京都中央区銀座6-13-16 銀座ウォールビルB1F ',
                'ward_id' => '2',
                'boardgame_num'          => '107',
                'price' =>'2800',
                'byo_flg' => '0',
                'home_url'       =>'http://pasela.co.jp/shop/ginza/',
                'content'      => 'カラオケパセラ銀座店は、カラオケはもちろん、
                パーティーや二次会、お食事やオフ会、接待でのご利用にもおすすめの高級感のあるバリ風リゾート空間です' ,],
            // 66
            [
                'shop_name'           => 'パセラリゾーツ渋谷店',
                'address'      => '東京都渋谷区神南1-22-9',
                'ward_id' => '13',
                'boardgame_num'          => '52',
                'price' =>'2800',
                'byo_flg' => '0',
                'home_url'       =>'https://www.pasela.co.jp/shop/shibuya/?pstop_left',
                'content'      => 'カラオケパセラ渋谷店は、カラオケは勿論のこと、
                パーティーや二次会、お食事やオフ会にもおすすめのバリ風リゾート空間です。
                系列レストランのノウハウ（技術・食材・レシピ）をそのままに活かした 本格多国籍料理と女性に大人気の名物ハニートースト、
                そして豊富な種類のドリンクを味わいながら曲数世界一を誇るパセラ自慢のオリジナルカラオケをお楽しみください。',],
            // 67
            [
                'shop_name'           => 'Cafe & GameBar ことぶき',
                'address'      => '東京都杉並区今川4-28-20　ハイツハルキチ寿館１０１',
                'ward_id' => '15',
                'boardgame_num'          => '406',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'http://www.tokimeki.tv/',
                'content'      => '西荻窪の閑静な住宅街の中にあるお店です。せかせかしている都会を離れてたまにはゆったりくつろぐのはいかがですか？',],
            // 68
            [
                'shop_name'           => 'リトルケイブ高円寺店',
                'address'      => '東京都杉並区高円寺南4-26-16 芦野ビル2階',
                'ward_id' => '15',
                'boardgame_num'          => '1537',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'http://littlecave.jp/',
                'content'      => '新宿から電車で7分、高円寺駅南口から徒歩30秒。
                リトルケイブはおひとり様でもご家族や友達でも楽しんでいただける
                ボードゲームカフェです！',],
            // 69
            [
                'shop_name'           => '古着とボードゲーム「どーん‼︎ズ」',
                'address'      => '東京都世田谷区北沢2−32−3 2F',
                'ward_id' => '12',
                'boardgame_num'          => '91',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://love-shimokitazawa.jp/archives/27193',
                'content'      => '古着を買ったり、ボードゲームで遊んだり！
                ボードゲームが遊べるテーブルエリアは飲食物の持ち込みもOK！
                電源やWi-Fiの貸し出しもありますよ！',],
            // 70
            [
                'shop_name'           => 'ゲームショップとど',
                'address'      => '東京都新宿区高田馬場3-3-9 山下ビル5階',
                'ward_id' => '4',
                'boardgame_num'          => '226',
                'price' =>'1000',
                'byo_flg' => '0',
                'home_url'       =>'https://todo.ocnk.net/',
                'content'      => '
                ゲームショップとどは、マジック・ザ・ギャザリングとボードゲームの販売店です。カードゲームとボードゲームのプレイヤーの相互交流を目指し、両者のプレイヤー人口を増やしていきたいと考えています。それぞれに興味をお持ちの方はどうぞ「ゲームショップとど」にお越しください。',],
            // 71
            [
                'shop_name'           => 'BOARDGAME & CAFE シュパース',
                'address'      => '東京都世田谷区赤堤4-41-5 あいばらビル2F',
                'ward_id' => '12',
                'boardgame_num'          => '201',
                'price' =>'2000',
                'byo_flg' => '1',
                'home_url'       =>'https://www.bgcafe-spass.com/',
                'content'      => '
                BOARD GAME & CAFE シュパースは世界中のボードゲームをどなたでも楽しむ事ができるカフェです。
                「ボードゲームをしたことがない」という方でも安心して楽しめるようインストラクターによる丁寧な
                ルール説明や様々な補助アイテムを用意していますのでぜひご友人やご家族、お客様の大切な方とご来店くださいませ。',],
            // 72
            [
                'shop_name'           => '人狼村',
                'address'      => '東京都豊島区東池袋1-28-1 タクトT・Oビル303',
                'ward_id' => '16',
                'boardgame_num'          => '174',
                'price' =>'1500',
                'byo_flg' => '0',
                'home_url'       =>'https://hermit-stp.co.jp/',
                'content'      => '人狼村 池袋にある、人狼ゲーム専門店です！ 営業時間 平日→17:00〜22:00 土日祝日→13:00〜22:00 火曜、水曜はお休みです。見学無料！一度遊びに来てみてください！ 6月1日から西口にてリニューアルオープン！人狼ゲーム以外にも多数イベント実施中最近はTRPGやマーダーミステリー、ギャンパラも！',],
            // 73
            [
                'shop_name'           => 'GOTTA2 CAFE',
                'address'      => '東京都新宿区西早稲田2丁目16-17 2階',
                'ward_id' => '4',
                'boardgame_num'          => '469',
                'price' =>'1800',
                'byo_flg' => '0',
                'home_url'       =>'https://cafe.gotta2.jp/',
                'content'      => '覚えて1分、遊んで5分！誰でも気軽に遊べるGOTTA2オリジナルのゲームから、世界で人気のボードゲームが400種類以上揃っております。初心者の方から、ボードゲームに興味のある方がゲームによるコミュニケーションを通じて楽しく、より仲良くなれるそんなカフェです。',],
            // 74
            [
                'shop_name'           => 'リトルケイブ新宿御苑店',
                'address'      => '東京都杉並区新宿１丁目１８ー５ネスト新宿御苑ビル２階',
                'ward_id' => '15',
                'boardgame_num'          => '488',
                'price' =>'2500',
                'byo_flg' => '0',
                'home_url'       =>'http://littlecave.jp/shinjuku/',
                'content'      => '世界各国のボードゲームで遊べて料理も美味しいカフェ「リトルケイブ」。 簡単な物からじっくり遊べる物まで、様々なゲームで遊ぶことができます。 お一人様でも相席いただくこともでき、グループでのご来店も歓迎致します。 ごはんやパスタ等の料理や、カクテル等のお酒や珈琲もお楽しみください。',],
            // 75
            [
                'shop_name'           => 'JELLY JELLY CAFE 立川店',
                'address'      => '東京都立川市錦町2-2-1',
                'ward_id' => '24',
                'boardgame_num'          => '907',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'http://jellyjellycafe.com/shoplist/tachikawa',
                'content'      => 'JELLY JELLY CAFE立川店は、大人から子どもまで楽しめるボードゲームカフェです。カップルや、サークル仲間、仕事仲間とお酒を片手に楽しい時間を過ごしてみませんか？ 立川駅南口より徒歩4分です。',],
            // 76
            [
                'shop_name'           => 'JELLY JELLY CAFE 水道橋店',
                'address'      => '東京都千代田区三崎町2−21−10　渡辺ビル3F',
                'ward_id' => '1',
                'boardgame_num'          => '184',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://jellyjellycafe.com/shoplist/suidobashi',
                'content'      => 'JELLY JELLY CAFE 水道橋店は、”東京ドームシティ”や”癒しの空間ラクーア”さらに実は隠れたグルメ充実スポットと、なかなか面白い水道橋駅東口から徒歩90秒という好立地にあります。ボードゲームと合わせてたっぷり楽しめるエンターテインメントタウン水道橋へ是非お越しください！',],
            // 77
            [
                'shop_name'           => 'サラダ館白鳥店',
                'address'      => '東京都葛飾区白鳥2-2-10',
                'ward_id' => '22',
                'boardgame_num'          => '214',
                'price' =>'4000',
                'byo_flg' => '0',
                'home_url'       =>'http://saladkan.chu.jp/',
                'content'      => 'ゲームマーケット2019春に出展！ 葛飾区のサラダ館白鳥店です。ファミリー・ビギナー向けボードゲームの販売、児童館や学童への出張ゲーム会、自店でのボードゲーム会を主催しています。',],
            // 78
            [
                'shop_name'           => 'どうぶつしょうぎcafe いっぷく',
                'address'      => '東京都江東区白河3-2-15 深川いっぷく',
                'ward_id' => '8',
                'boardgame_num'          => '83',
                'price' =>'1000',
                'byo_flg' => '0',
                'home_url'       =>'http://fukagawa-ippuku.com/',
                'content'      => '東京・清澄白河「どうぶつしょうぎcafeいっぷく」の店主です。cafeで寛ぎながら気軽にボードゲームと出会える場所を作ってます。',],
            // 79
            [
                'shop_name'           => 'ゲームバーグリュック',
                'address'      => '東京都千代田区飯田橋4-2-6 アヴァンセ飯田橋2F',
                'ward_id' => '1',
                'boardgame_num'          => '473',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'https://barglueck.com/',
                'content'      => 'グリュックへようこそ。ドイツを中心に、世界中のボードゲーム・カードゲームを取り揃えております。お酒はもちろん、『楽しい』をテーマにしたノンアルコールカクテルもご用意しております。',],
            // 80
            [
                'shop_name'           => '人狼HOUSE 渋谷店',
                'address'      => '東京都渋谷区桜丘町3-1TNビル4F',
                'ward_id' => '13',
                'boardgame_num'          => '79',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'http://werewolf-house.com/',
                'content'      => '老若男女、人狼初心者から人狼廃人まで、人狼に興味を持っている方は誰でも大歓迎です！',],
            // 81
            [
                'shop_name'           => '中野ボードゲーム＆ダイニングバーkurumari',
                'address'      => '東京都中野区中野2-28-1中野JMビル2F',
                'ward_id' => '14',
                'boardgame_num'          => '459',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'https://kurumari.net/',
                'content'      =>
                'kurumari（くるまり）は、「おいしい時間」と「楽しい時間」がひとつになった「遊べるレストラン」です。
                お酒を飲みながら、ご飯を食べながら、ボードゲームで盛り上がる。
                ちょっとお行儀が悪いけど、ご飯の時間がずっと楽しくなるお店です。仲間で。カップルで。家族で。
                いつもよりワクワクするお食事タイムをどうぞ。',],
            // 82
            [
                'shop_name'           => 'JELLY JELLY CAFE 渋谷店',
                'address'      => '東京都渋谷区宇田川町10-2',
                'ward_id' => '13',
                'boardgame_num'          => '605',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'https://jellyjellycafe.com/shoplist/shibuya',
                'content'      => 'JELLY JELLY CAFE の原点、1号店でもある渋谷店は、2011年9月にオープンしました。オープン当初は20個ほどしかなかったボードゲームも日に日に増えていき、今では900個以上の品揃えとなりました。JELLY JELLY CAFE全店舗の中で最も豊富な品揃えの1号店です。渋谷駅ハチ公口より徒歩7分。東急ハンズ近くの、通称「シスコ坂」を登る途中に隠れ家的にたたずんでいます。',],
            // 83
            [
                'shop_name'           => 'アソビCafe',
                'address'      => '東京都千代田区神田神保町1-32-42 堀井ビル1F',
                'ward_id' => '1',
                'boardgame_num'          => '441',
                'price' =>'2000',
                'byo_flg' => '0',
                'home_url'       =>'http://asobicafe.com/',
                'content'      => 'アソビCafe」は世界中のボードゲームを遊べるカフェバーです。 美味しい食事や飲み物を片手に、ゲームやコミュニケーションを楽しむことが出来ます。当店で特に重視しているのは「ひとりで来ても安心」であることです。 スタッフによるお客様同士のテーブルセッティングや、ゲームのご紹介、 初めて遊ぶ方や初心者さんのサポートなどを行なうことで 快適な「誰でも遊べるゲームカフェ」を実現いたします。',],
            // 84
            [
                'shop_name'           => 'JELLY JELLY CAFE 下北沢店',
                'address'      => '東京都世田谷区北沢2-11-3-202',
                'ward_id' => '12',
                'boardgame_num'          => '335',
                'price' =>'1500',
                'byo_flg' => '1',
                'home_url'       =>'http://jellyjellycafe.com/shoplist/shimokitazawa',
                'content'      => 'JELLY JELLY CAFE 下北沢店は、演劇やバンド、古着など様々なカルチャーの聖地とも言える下北沢駅より徒歩1分という好アクセスな店舗です。最大6名まで座れる円卓も設置されています。下北沢散策と合わせてボードゲームも楽しんでください！',
            ]
        ]);
    }
}
