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
            // $shop->reviews()->save(factory(Photo::class)->make());
        });

        $shop = Shop::first();

        $response = $this->json('GET', route('shop.show', [
            'id' => $shop->id,
        ]));

        // error_log(print_r($shop->reviews));
        // error_log(print_r($response));
        // var_dump($shop->reviews);
        // exit;

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $shop->id,
                'ward_id' => $shop->ward_id,
                'shop_name' => $shop->shop_name,
                'address' => $shop->address,
                'boardgame_num' => $shop->boardgame_num,
                'content' => $shop->content,
                // 'photos' => $shop->photos->filename,
                'price' => $shop->price,
                'liked_by_user' => false,
                'likes_count' => 0,
                'reviews' => $shop->reviews
                    ->sortByDesc('id')
                    ->map(function ($review) {
                        return [
                            'author' => [
                                'email' => $review->author->email,
                                'name' => $review->author->name,
                                'favorite_shops' => $review->author->favorite_shops,
                                'icon_url' => $review->author->icon_url,
                                'id' => $review->author->id,
                                'password' => $review->author->password,
                            ],
                            'content' => $review->content,
                            'user_photo' => [
                                'email' => $review->user_photo->email,
                                'name' => $review->user_photo->name,
                                'favorite_shops' => $review->user_photo->favorite_shops,
                                'icon_url' => $review->user_photo->icon_url,
                                'id' => $review->user_photo->id,
                                'password' => $review->user_photo->password,
                            ],
                            'date' => $review->date,
                        ];
                    }) ->all(),
            ]);
    }
}
