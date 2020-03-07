<?php

use Illuminate\Http\Request;

// 会員登録
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// ログイン
Route::post('/login', "Auth\LoginController@login")->name('login');

// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

<<<<<<< HEAD
// ログインチェック
Route::get('/user', fn () => Auth::user())->name('user');
=======
// ログインユーザー
// Route::get('/user', fn () => Auth::user())->name('user');
Route::get('/user', function () {
    return Auth::user();
})->name('user');
>>>>>>> deploy


// 店舗登録
Route::post('/shops', 'ShopController@create')->name('shop.create');

// 店舗一覧
Route::get('/shops', 'ShopController@index')->name('shop.index');

// 店舗詳細
Route::get('/shops/{id}', 'ShopController@show')->name('shop.show');

// レビュー
Route::post('/shops/{shop}/reviews', 'ShopController@addReview')->name('shop.review');

// いいね
Route::put('/shops/{id}/like', 'ShopController@like')->name('shop.like');

// いいね解除
Route::delete('/shops/{id}/unlike', 'ShopController@unlike');

// ユーザー情報取得
Route::get('/profile', 'UserController@show')->name('profile');

// トークンリフレッシュ
Route::get('/reflesh-token', function (Illuminate\Http\Request $request) {
    $request->session()->regenerateToken();

    return response()->json();
});
