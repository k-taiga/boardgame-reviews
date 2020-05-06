<?php

namespace Tests\Feature;

// Model
use App\Photo;
use App\User;
use App\Shop;
// DB
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// Upload&Storage
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

class ShopSubmitApiTest extends TestCase
{
    use RefreshDatabase;

    // vendor/bin/phpunit tests/Feature/ShopSubmitApiTest --testdox

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * @test
     */
    public function test_file_upload()
    {

        $this->withoutExceptionHandling();
        // S3ではなくテスト用のストレージを使用する
        // → storage/framework/testing
        Storage::fake('s3');

        $response = $this->json('POST', route('shop.create'), [
          'ward_id' => '1',
          'shop_name' => 'boardgameReviews',
          'address' => '000-0000',
          'boardgame_num' => '100',
          'content' => 'sample',
          'home_url' => 'sample.com',
          'price' => '1000',
          'byo_flg' => '0',
          // ダミーファイルを作成して送信
          'photo' => UploadedFile::fake()->image('photo.png'),
        ]);

        // レスポンスが201(CREATED)であること
        $response->assertStatus(201);

        $photo = Photo::first();

        // 写真のIDが12桁のランダムな文字列であること
        $this->assertRegExp('/^shop_[0-9a-zA-Z-_]{12}$/', $photo->id);

        // DBに挿入されたファイル名のファイルがストレージに保存されていること
        Storage::cloud()->assertExists($photo->filename);

        $shop = Shop::first();

        $response = $this->json('GET', route('shop.show', [
            'id' => $shop->id,
        ]));

        $response->assertStatus(200)
          ->assertJsonFragment([
              'id' => $shop->id,
              'ward_id' => $shop->ward_id,
              'shop_name' => $shop->shop_name,
              'address' => $shop->address,
              'boardgame_num' => $shop->boardgame_num,
              'content' => $shop->content,
              'price' => $shop->price,
              'home_url' => $shop->home_url,
              'liked_by_user' => false,
              'likes_count' => 0,
              'photos' =>  [
                'id' => $photo->id,
                'url' => $photo->url,
              ],
              'reviews' => $shop->reviews
          ]);
    }

    /**
     * @test
     */
    public function test_not_file_upload_for_db_error()
    {
        // 乱暴だがこれでDBエラーを起こす
        Schema::drop('photos');

        Storage::fake('s3');

        $response = $this->actingAs($this->user)
            ->json('POST', route('shop.create'), [
                'ward_id' => '1',
                'shop_name' => 'boardgameReviews',
                'address' => '000-0000',
                'boardgame_num' => '100',
                'content' => 'sample',
                'home_url' => 'sample.com',
                'price' => '1000',
                'byo_flg' => '0',
                'photo' => null,
            ]);

        // レスポンスが500(INTERNAL SERVER ERROR)であること
        $response->assertStatus(500);

        // ストレージにファイルが保存されていないこと
        $this->assertEquals(0, count(Storage::cloud()->files()));
    }

    /**
     * @test
     */
    public function test_not_file_upload_for_s3_error()
    {
        // ストレージをモックして保存時にエラーを起こさせる
        Storage::shouldReceive('cloud')
            ->once()
            ->andReturnNull();

        $response = $this->actingAs($this->user)
            ->json('POST', route('shop.create'), [
                'ward_id' => '1',
                'shop_name' => 'boardgameReviews',
                'address' => '000-0000',
                'boardgame_num' => '100',
                'content' => 'sample',
                'home_url' => 'sample.com',
                'price' => '1000',
                'byo_flg' => '0',
                'photo' => UploadedFile::fake()->image('photo.png'),
            ]);

        // レスポンスが500(INTERNAL SERVER ERROR)であること
        $response->assertStatus(500);

        // データベースに何も挿入されていないこと
        $this->assertEmpty(Shop::all());
    }
}
