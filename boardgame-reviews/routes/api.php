<?php

use Illuminate\Http\Request;

// 会員登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// ログイン
Route::post('/login', "Auth\LoginController@login")->name('login');

// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// ログインチェック
// ↓php7.4以降の書き方
// Route::get('/user', fn () => Auth::user())->name('user');
Route::get('/user', function () {
    return Auth::user();
})->name('user');

// 店舗検索
Route::get('/search-shops/{keyword}', 'ShopController@search')->name('shop.search');

Route::prefix('shops')->group(function(){

  // 店舗登録
  Route::post('', 'ShopController@create')->name('shop.create');

  // 店舗一覧
  Route::get('', 'ShopController@index')->name('shop.index');

  // 店舗詳細
  Route::get('{id}', 'ShopController@show')->name('shop.show');

  // レビュー
  Route::post('{shop}/reviews', 'ShopController@addReview')->name('shop.review');

  // いいね
  Route::put('{id}/like', 'ShopController@like')->name('shop.like');

  // いいね解除
  Route::delete('{id}/unlike', 'ShopController@unlike')->name('shop.unlike');

});


Route::prefix('wards')->group(function(){

  // 23区一覧
  Route::get('', 'WardController@index')->name('ward.index');

  // 23区詳細
  Route::get('{id}', 'WardController@show')->name('ward.show');

  // 23区でのソート
  Route::get('{id}/{sort}', 'WardController@sort')->name('ward.sort');

  // 23区でのフィルター
  Route::post('{id}/', 'WardController@filter')->name('ward.filter');

  // 23区でのフィルター＆ソート
  Route::post('{id}/{sort}', 'WardController@filterSort')->name('ward.filter_sort');

});


Route::prefix('profile')->group(function(){

  // ユーザー情報取得
  Route::get('', 'UserController@show')->name('profile.show');

  // ユーザー情報編集
  Route::post('edit', 'UserController@update')->name('profile.update');

  // ユーザー退会
  Route::post('destroy', 'UserController@destroy')->name('profile.destroy');

  // ユーザー認証情報編集
  Route::post('credential', 'UserController@updateCredential')->name('profile.credentialUpdate');

});

// ソーシャルログイン
Route::prefix('auth')->middleware('guest')->group(function() {

  Route::get('/{provider}', 'Auth\OAuthController@socialOAuth')
      ->where('provider','google')
      ->name('socialOAuth');

   Route::get('/{provider}/callback', 'Auth\OAuthController@handleProviderCallback')
       ->where('provider','google')
       ->name('oauthCallback');
});


// トークンリフレッシュ
Route::get('/reflesh-token', function (Illuminate\Http\Request $request) {
    $request->session()->regenerateToken();

    return response()->json();
});
