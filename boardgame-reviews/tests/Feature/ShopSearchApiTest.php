<?php

namespace Tests\Feature;

use App\Shop;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShopSearchApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_correct_json()
    {
        $this->withoutExceptionHandling();

        // 店舗データを生成する
        factory(Shop::class)->create();

        // 生成した店舗データ取得
        $shop = Shop::with(['photos'])->first();

        $response = $this->json('GET', route(('shop.search'),$shop->shop_name));

        $response->dump();

        $response->assertStatus(200)
            // レスポンスJSONの要素が1つであること
            ->assertJsonCount(1)
            // レスポンスJSONのdata項目が期待値と合致すること
            ->assertJsonFragment([
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
            ]);
    }
}
