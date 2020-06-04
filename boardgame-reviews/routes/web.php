<?php

// SPAのため全部のルーティングはindexに飛ばす
// any パラメータはあってもなくてもいい（?）し、ある場合はどんな文字列でもいい（.+）ということ
// アロー関数はphp7.4から
// Route::get('/{any?}', fn() => view('index'))->where('any', '.+');


// ソーシャルログイン
Route::prefix('auth')->middleware('guest')->group(function(){

  Route::get('/{provider}', 'Auth\OAuthController@socialOAuth')
      ->where('provider','google')
      ->name('socialOAuth');

   Route::get('/{provider}/callback', 'Auth\OAuthController@handleProviderCallback')
       ->where('provider','google')
       ->name('oAuthCallback');
});

// それ以前の書き方
Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.+');
