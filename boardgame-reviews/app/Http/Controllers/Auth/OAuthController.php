<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

use App\User;
use Auth;

class OAuthController extends Controller
{
    /**
     * 各SNSのOAuth認証画面にリダイレクトして認証
     * @param string $provider サービス名
     * @return mixed
     */
    public function socialOAuth(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * 各サイトからのコールバック
     * @param string $provider サービス名
     * @return mixed
     */
    public function handleProviderCallback($provider)
    {
      $socialUser = Socialite::driver($provider)->user();
      // ソーシャルログインしたユーザーのemailがすでにあるかチェック
      $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

      // なければユーザーデータを登録　あればそのままログイン
      if(!$user->exists){
        // ソーシャルログインしたユーザーのデータを登録する
        $user->name = $socialUser->getNickname() ?? $socialUser->getName() ?? $socialUser->getNick();
        $user->email = $socialUser->getEmail();
        $user->provider_id = $socialUser->getId();
        $user->provider_name = $provider;
        $user->save();
      }

      Auth::login($user);
      return redirect()->route('/');
    }
}
