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

class WardsSortApiTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
      parent::setUp();

      $this->user = factory(User::class)->create();

      factory(Shop::class)->create();

      $this->like_shop = Shop::first();

      $this->ward_id = $this->like_shop->ward_id;

      $this->actingAs($this->user)->json('PUT', route('shop.like', [
          'id' => $this->like_shop->id,
      ]));
  }

  public function test_correct_json_for_sort()
  {
      $this->withoutExceptionHandling();

      Storage::fake('s3');

      $this->json('POST', route('shop.create'), [
        'ward_id' => $this->ward_id,
        'shop_name' => 'boardgameReviews',
        'address' => '000-0000',
        'boardgame_num' => '100',
        'content' => 'sample',
        'home_url' => 'sample.com',
        'price' => '1000',
        'byo_flg' => '0',
        'photo' => UploadedFile::fake()->image('photo.png'),
      ]);

      $review_shop = Shop::where('shop_name','boardgameReviews')->first();

      $content = 'sample content';

      $this->actingAs($this->user)
          ->json('POST', route('shop.review', [
              'shop' => $review_shop->id,
          ]), compact('content'));

      // レビューのソート順
      $response = $this->json('GET', route('ward.sort',
      ['id'=> $review_shop->ward_id,
       'sort' =>'review']));

      $expected = [$review_shop->id,$this->like_shop->id];

      $response->assertStatus(200)
        ->assertSeeInOrder($expected);

      // お気に入りのソート順
      $response = $this->json('GET', route('ward.sort',
      ['id'=> $review_shop->ward_id,
        'sort' =>'follower']));

      $expected = [$this->like_shop->id,$review_shop->id];

      $response->assertStatus(200)
        ->assertSeeInOrder($expected);
  }
}
