<?php

namespace Tests\Feature;

// Model
use App\Photo;
use App\User;
// DB
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
// Upload&Storage
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

class PhotoSubmitApiTest extends TestCase
{
    use RefreshDatabase;

    // vendor/bin/phpunit tests/Feature/PhotoSubmitApiTest --testdox

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * @test
     */
    public function testFileUpload()
    {
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

        $response->dump();
        exit;

        // レスポンスが201(CREATED)であること
        $response->assertStatus(201);

        $photo = Photo::first();

        // 写真のIDが12桁のランダムな文字列であること
        $this->assertRegExp('/^[0-9a-zA-Z-_]{12}$/', $photo->id);

        // DBに挿入されたファイル名のファイルがストレージに保存されていること
        Storage::cloud()->assertExists($photo->filename);
    }

    /**
     * @test
     */
    // public function test_not_file_upload_for_db_error()
    // {
    //     // 乱暴だがこれでDBエラーを起こす
    //     Schema::drop('photos');

    //     Storage::fake('s3');

    //     $response = $this->actingAs($this->user)
    //         ->json('POST', route('photo.create'), [
    //             'photo' => UploadedFile::fake()->image('photo.jpg'),
    //         ]);

    //     // レスポンスが500(INTERNAL SERVER ERROR)であること
    //     $response->assertStatus(500);

    //     // ストレージにファイルが保存されていないこと
    //     $this->assertEquals(0, count(Storage::cloud()->files()));
    // }

    /**
     * @test
     */
    // public function test_not_file_upload_for_s3_error()
    // {
    //     // ストレージをモックして保存時にエラーを起こさせる
    //     Storage::shouldReceive('cloud')
    //         ->once()
    //         ->andReturnNull();

    //     $response = $this->actingAs($this->user)
    //         ->json('POST', route('photo.create'), [
    //             'photo' => UploadedFile::fake()->image('photo.jpg'),
    //         ]);

    //     // レスポンスが500(INTERNAL SERVER ERROR)であること
    //     $response->assertStatus(500);

    //     // データベースに何も挿入されていないこと
    //     $this->assertEmpty(Photo::all());
    // }
}
