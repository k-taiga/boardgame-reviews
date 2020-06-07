<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WardsListApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
      parent::setUp();

      $this->seed('WardsTableSeeder');
    }
    /**
     * @test
     */
    public function test_correct_json()
    {
        $this->withoutExceptionHandling();

        $response = $this->json('GET', route('ward.index'));

        $response->assertStatus(200)
        // レスポンスJSONの要素が24であること
        ->assertJsonCount(24);
    }
}
