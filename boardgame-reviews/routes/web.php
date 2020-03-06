<?php

// SPAのため全部のルーティングはindexに飛ばす
// any パラメータはあってもなくてもいい（?）し、ある場合はどんな文字列でもいい（.+）ということ
// アロー関数はphp7.4から
// Route::get('/{any?}', fn() => view('index'))->where('any', '.+');

// それ以前の書き方
Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.+');
