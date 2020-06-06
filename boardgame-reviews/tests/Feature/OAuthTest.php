<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use Auth;
use Socialite;
use Mockery;

class OAuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
      parent::setUp();

      // Mockに対してそのクラスに本来存在しないメソッドが追加された場合にエラーにするかどうかの設定
      Mockery::getConfiguration()->allowMockingNonExistentMethods(false);

      $this->providerName = "google";

      // モックを作成
      // SocialiteのUserクラスのモックを作成
      $this->user = Mockery::mock('Laravel\Socialite\Two\User');

      $this->user
      //getId()メソッドにuniqidを返すように設定
      ->shouldReceive('getId')
      ->andReturn(uniqid())
      ->shouldReceive('getEmail')
      ->andReturn(uniqid().'@test.com')
      ->shouldReceive('getNickname')
      ->andReturn('Pseudo');

      // Socialiteのproviderのモックを作成
      $this->provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
      // providerのuserメソッドでこのモックのuserを返す
      $this->provider->shouldReceive('user')->andReturn($this->user);

    }

    // :voidは返り値がなし
    public static function tearDownAfterClass(): void
    {
        // Mockeryの設定をもとに戻す
        Mockery::getConfiguration()->allowMockingNonExistentMethods(true);
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
      $this->withoutExceptionHandling();

      // withでshouldReceiveの引数を指定　そして返す中身はandReturnで指定
      Socialite::shouldReceive('driver')->with($this->providerName)->andReturn($this->provider);

      // URLをコール
      $this->get(route('oAuthCallback', ['provider' => $this->providerName]))
          ->assertStatus(302)
          ->assertRedirect(route('index'));

      // 各データが正しく登録されているかチェック
      $this->assertDatabaseHas('users', [
          'provider_id' => $this->user->getId(),
          'provider_name' => $this->providerName,
          'name' => $this->user->getNickname(),
          'email' => $this->user->getEmail()
      ]);

      // 認証チェック
      $this->assertAuthenticated();
    }
}
