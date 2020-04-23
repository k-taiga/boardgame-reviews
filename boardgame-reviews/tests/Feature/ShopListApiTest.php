<?php

namespace Tests\Feature;

use App\Shop;
use App\Photo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShopListApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_correct_json()
    {
        $this->withoutExceptionHandling();

        // 5つの店舗データを生成する
        factory(Shop::class, 5)->create();

        $response = $this->json('GET', route('shop.index'));

        // 生成した写真データを作成日降順で取得
        $shops = Shop::with(['photos'])->orderBy('created_at', 'desc')->get();

        // data項目の期待値
        $expected_data = $shops->map(function ($shop) {
            return [
                'id' => $shop->id,
                'ward_id' => $shop->ward_id,
                'shop_name' => $shop->shop_name,
                'address' => $shop->address,
                'boardgame_num' => $shop->boardgame_num,
                'content' => $shop->content,
                'price' => $shop->price,
                'home_url' => $shop->home_url,
                'photos' => null,
                'liked_by_user' => false,
                'likes_count' => 0,
            ];
        })
        ->all();

        $response->assertStatus(200)
            // レスポンスJSONのdata項目に含まれる要素が5つであること
            ->assertJsonCount(5, 'data')
            // レスポンスJSONのdata項目が期待値と合致すること
            ->assertJsonFragment([
                "data" => $expected_data,
            ]);
    }
}
