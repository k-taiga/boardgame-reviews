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
        $extension = $request->photo->extension();
        $photo = new Photo();
        // インスタンス生成時に割り振られたランダムなID値と本来の拡張子を組み合わせてファイル名とする
        $photo->filename = $photo->id . '.' . $extension;

        // $photo = Photo::where(
        //     'id',
        //     '4KtCDo-ulGOL'
        // )->first();

        // S3にファイルを保存する publicで公開
        Storage::cloud()
        ->putFileAs('', $request->photo, $photo->filename, 'public');

        // $shop = new Shop();
        // clock($photo);
        // $shop->shop_name = $request->shop_name;
        // $shop->address = $request->address;
        // clock()->info("{$shop}が logに出ています！");
        // clock($shop);
        // $photo->shop_id = $shop->id;
        // $shop->photos()->save($photo);

        // データベースエラー時にファイル削除を行うため
        // トランザクションを利用する
        DB::beginTransaction();

        try {
            // Auth::user()->photos()->save($photo);
            $shop = new Shop();
            $shop->shop_name = $request->shop_name;
            $shop->address = $request->address;
            // shopに登録後、紐づくphotoをsave
            $shop->save();
            $photo->shop_id = $shop->id;
            $shop->photos()->save($photo);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            // DBとの不整合を避けるためアップロードしたファイルを削除
            Storage::cloud()->delete($photo->filename);
            throw $exception;
        }

        // リソースの新規作成なので
        // レスポンスコードは201(CREATED)を返却する
        // vueでキャッチする
        return response($shop, 201);
    }
}
