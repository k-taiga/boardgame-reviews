<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreShop;
use App\Shop;
use App\Photo;

use App\Review;
use App\Http\Requests\StoreReview;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function __construct()
    {
        // 認証に通す
        // authに通らなくても使えるもの
        $this->middleware('auth')->except(['index', 'show', 'create']);
    }

    /**
     * 店舗一覧取得
     */
    public function index()
    {
        $shops = Shop::with(['photos', 'likes'])->orderBy(Shop::CREATED_AT, 'desc')->paginate();

        return $shops;
    }

    /**
     * 店舗登録
     * @param StoreShop $request
     * @return \Illuminate\Http\Response
     */
    public function create(StoreShop $request)
    {
        // 写真の拡張子を取得
        // $extension = $request->photo->extension();

        // $photo = new Photo();

        $shop = new Shop();

        // clock($request);
        // clock()->info("{$shop}が logに出ています！");
        $shop = $request->all();
        // clock()->info("{$shop}が logに出ています！");
        clock($shop);
        $shop->photos()->save();

        // Shop::new()->photos()->createMany([$request->all()]);

        // インスタンス生成時に割り振られたランダムなID値と本来の拡張子を組み合わせてファイル名とする
        // $photo->filename = $photo->id . '.' . $extension;

        // // S3にファイルを保存する publicで公開
        // Storage::cloud()
        //     ->putFileAs('', $request->photo, $photo->filename, 'public');

        // // データベースエラー時にファイル削除を行うため
        // // トランザクションを利用する
        // DB::beginTransaction();

        // try {
        //     // Auth::user()->photos()->save($photo);
        //     $shop = new Shop();
        //     $shop->photos()->save($photo);
        //     DB::commit();
        // } catch (\Exception $exception) {
        //     DB::rollBack();
        //     // DBとの不整合を避けるためアップロードしたファイルを削除
        //     Storage::cloud()->delete($photo->filename);
        //     throw $exception;
        // }

        // リソースの新規作成なので
        // レスポンスコードは201(CREATED)を返却する
        // vueでキャッチする
        return response($shop, 201);
    }
}
