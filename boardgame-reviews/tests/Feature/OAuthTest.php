<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OAuthTest extends TestCase
{
    public function setUp():void
    {
      parent::setUp();
      $this->providerName = "google";
    }

    /**
     * test
     */
    public function test_Googleの認証画面を表示できる()
    {
      $response = $this->get(route('socialOAuth', ['provider' => $this->providerName]));
      // 302 => リクエストされたリソースが一時的に Location で示された URL へ移動した
      $response->assertStatus(302);

      $target = parse_url($response->headers->get('location'));

      // リダイレクトした先のドメインを検証
      $this->assertEquals('accounts.google.com', $target['host']);

      // var_dump($target['query']);
      // exit;
      // // クエリパラメータの検証
      // $query = explode('&',$target['query']);
      // // 'redirect' => env('GOOGLE_CALLBACK_URL'),'client_id' => env('GOOGLE_CLIENT_ID')と同じクエリが飛ばされてるかチェック
      // $this->assertContains('redirect_uri=' . urlencode(config('services.google.redirect')), $query);
      // $this->assertContains('client_id=' . config('services.google.client_id'), $query);

    }

    /**
     * test
     */
    public function test_Googleアカウントでユーザー登録できる()
    {
      $this->get(route('oAuthCallback', ['provider' => $this->providerName]))
        ->assertStatus(200);
    }

}
