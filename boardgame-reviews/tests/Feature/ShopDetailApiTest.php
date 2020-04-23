<?php

namespace Tests\Feature;

use App\Shop;
use App\Review;
use App\Photo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShopDetailApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_correct_json()
    {
        $this->withoutExceptionHandling();

        factory(Shop::class)->create()->each(function ($shop) {
            $shop->reviews()->saveMany(factory(Review::class, 3)->make());
        });

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
                'reviews' => $shop->reviews
                    ->sortByDesc('id')
                    ->map(function ($review) {
                        return [
                            'author' => [
                                'id' => $review->author->id,
                                'name' => $review->author->name,
                                'email' => $review->author->email,
                                'password' => $review->author->password,
                                'icon_url' => $review->author->icon_url,
                                'favorite_shops' => $review->author->favorite_shops,
                            ],
                            'content' => $review->content,
                            'user_photo' => [
                                'id' => $review->user_photo->id,
                                'name' => $review->user_photo->name,
                                'email' => $review->user_photo->email,
                                'password' => $review->user_photo->password,
                                'icon_url' => $review->user_photo->icon_url,
                                'favorite_shops' => $review->user_photo->favorite_shops,
                            ],
                            'date' => $review->date,
                        ];
                    }) ->all(),
            ]);
    }
}
