<?php

namespace Tests\Feature;

use App\Shop;
use App\User;
use App\Review;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WardsFilterApiTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
      parent::setUp();

      $this->seed('WardsTableSeeder');

      Storage::fake('s3');

      $this->ward_id = 1;

      $this->json('POST', route('shop.create'), [
        'ward_id' => $this->ward_id,
        'shop_name' => 'sample_1',
        'address' => '000-0000',
        'boardgame_num' => '100',
        'content' => 'sample',
        'home_url' => 'sample.com',
        'price' => '1000',
        'byo_flg' => '0',
        'photo' => UploadedFile::fake()->image('photo.png'),
      ]);

      $this->json('POST', route('shop.create'), [
        'ward_id' => $this->ward_id,
        'shop_name' => 'sample_2',
        'address' => '000-0000',
        'boardgame_num' => '200',
        'content' => 'sample',
        'home_url' => 'sample.com',
        'price' => '2000',
        'byo_flg' => '0',
        'photo' => UploadedFile::fake()->image('photo.png'),
      ]);

      $this->json('POST', route('shop.create'), [
        'ward_id' => $this->ward_id,
        'shop_name' => 'sample_3',
        'address' => '000-0000',
        'boardgame_num' => '300',
        'content' => 'sample',
        'home_url' => 'sample.com',
        'price' => '3000',
        'byo_flg' => '1',
        'photo' => UploadedFile::fake()->image('photo.png'),
      ]);

  }

  public function test_correct_json()
  {
      $this->withoutExceptionHandling();

      // ボードゲームの数でFilter
      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'100',
        'price' =>'',
        'byo_flg' => ''
      ]));

      $count = 3;

      var_dump($response['data']);

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'200',
        'price' =>'',
        'byo_flg' => ''
      ]));

      $count = 2;

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'300',
        'price' =>'',
        'byo_flg' => ''
      ]));

      $count = 1;

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

      // 予算でFilter
      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'',
        'price' =>'1000',
        'byo_flg' => ''
      ]));

      $count = 1;

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'',
        'price' =>'2000',
        'byo_flg' => ''
      ]));

      $count = 2;

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'',
        'price' =>'3000',
        'byo_flg' => ''
      ]));

      $count = 3;

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

      // byoでFilter
      $response = $this->json('POST', route('ward.filter',[
        'id'=> $this->ward_id,
        'boardgame' =>'',
        'price' =>'',
        'byo_flg' => '1'
      ]));

      $count = 1;

      $response->assertStatus(200)
      ->assertJsonCount($count, $key = 'data');

  }
}
