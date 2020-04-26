<?php

namespace Tests\Feature;

use App\Shop;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCommentApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // テストユーザー作成
        $this->user = factory(User::class)->create();
    }

    /**
     * @test
     */
    public function test_add_reviews()
    {
        $this->withoutExceptionHandling();
        factory(Shop::class)->create();
        $shop = Shop::first();

        $content = 'sample content';

        $response = $this->actingAs($this->user)
            ->json('POST', route('shop.review', [
                'shop' => $shop->id,
            ]), compact('content'));

        $review = $shop->reviews()->get();

        $response->assertStatus(201)
            // JSONフォーマットが期待通りであること
            ->assertJsonFragment([
                "author" => [
                    'id' => $this->user->id,
                    "name" => $this->user->name,
                    'email' => $this->user->email,
                    'password' => $this->user->password,
                    'icon_url' => $this->user->icon_url,
                    'favorite_shops' => $this->user->favorite_shops,
                ],
                "content" => $content,
            ]);

        // DBにレビューが1件登録されていること
        $this->assertEquals(1, $review->count());
        // 内容がAPIでリクエストしたものであること
        $this->assertEquals($content, $review[0]->content);
    }
}
