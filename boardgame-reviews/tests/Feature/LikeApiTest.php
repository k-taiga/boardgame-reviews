<?php

namespace Tests\Feature;

use App\Shop;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        factory(Shop::class)->create();
        $this->shop = Shop::first();
    }

    /**
     * @test
     */
    public function test_add_likes()
    {
        $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user)
            ->json('PUT', route('shop.like', [
                'id' => $this->shop->id,
            ]));

        $response->assertStatus(200)
            ->assertJsonFragment([
                'shop_id' => $this->shop->id,
            ]);

        $this->assertEquals(1, $this->shop->likes()->count());
    }

    /**
     * @test
     */
    public function test_duplicate_likes()
    {
        $this->withoutExceptionHandling();
        $param = ['id' => $this->shop->id];
        $this->actingAs($this->user)->json('PUT', route('shop.like', $param));
        $this->actingAs($this->user)->json('PUT', route('shop.like', $param));

        $this->assertEquals(1, $this->shop->likes()->count());
    }

    /**
     * @test
     */
    public function test_remove_likes()
    {
        $this->withoutExceptionHandling();
        $this->shop->likes()->attach($this->user->id);

        $response = $this->actingAs($this->user)
            ->json('DELETE', route('shop.unlike', [
                'id' => $this->shop->id,
            ]));

        $response->assertStatus(200)
            ->assertJsonFragment([
                'shop_id' => $this->shop->id,
            ]);

        $this->assertEquals(0, $this->shop->likes()->count());
    }
}
