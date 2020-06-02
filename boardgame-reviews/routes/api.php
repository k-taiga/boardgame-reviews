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

// 店舗登録
Route::post('/shops', 'ShopController@create')->name('shop.create');

// 店舗一覧
Route::get('/shops', 'ShopController@index')->name('shop.index');

// 店舗検索
Route::get('/search-shops/{keyword}', 'ShopController@search')->name('shop.search');

// 店舗詳細
Route::get('/shops/{id}', 'ShopController@show')->name('shop.show');

// レビュー
Route::post('/shops/{shop}/reviews', 'ShopController@addReview')->name('shop.review');

// いいね
Route::put('/shops/{id}/like', 'ShopController@like')->name('shop.like');

// いいね解除
Route::delete('/shops/{id}/unlike', 'ShopController@unlike')->name('shop.unlike');

// 23区一覧
Route::get('/wards', 'WardController@index')->name('ward.index');

// 23区詳細
Route::get('/wards/{id}', 'WardController@show')->name('ward.show');

// 23区でのソート
Route::get('/wards/{id}/{sort}', 'WardController@sort')->name('ward.sort');

// 23区でのフィルター
Route::post('/wards/{id}/', 'WardController@filter')->name('ward.filter');

// 23区でのフィルター＆ソート
Route::post('/wards/{id}/{sort}', 'WardController@filterSort')->name('ward.filter_sort');

// ユーザー情報取得
Route::get('/profile', 'UserController@show')->name('profile.show');

// ユーザー情報編集
Route::post('/profile/edit', 'UserController@update')->name('profile.update');

// ユーザー退会
Route::post('/profile/destroy', 'UserController@destroy')->name('profile.destroy');

// ユーザー認証情報編集
Route::post('/profile/credential', 'UserController@updateCredential')->name('profile.credentialUpdate');

// トークンリフレッシュ
Route::get('/reflesh-token', function (Illuminate\Http\Request $request) {
    $request->session()->regenerateToken();

    return response()->json();
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
