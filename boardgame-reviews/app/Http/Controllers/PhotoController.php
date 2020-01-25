<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoto;
use App\Photo;

use App\Review;
use App\Http\Requests\StoreReview;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    public function __construct()
    {
        // 認証に通す
        // authに通らなくても使えるもの
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * 写真一覧取得
     */
    public function index()
    {
        $photos = Photo::with(['owner', 'likes'])->orderBy(Photo::CREATED_AT, 'desc')->paginate();

        return $photos;
    }

    /**
     * 写真投稿
     * @param StorePhoto $request
     * @return \Illuminate\Http\Response
     */
    public function create(StorePhoto $request)
    {
        // 写真の拡張子を取得
        $extension = $request->photo->extension();

        $photo = new Photo();

        // インスタンス生成時に割り振られたランダムなID値と本来の拡張子を組み合わせてファイル名とする
        $photo->filename = $photo->id . '.' . $extension;

        // S3にファイルを保存する publicで公開
        Storage::cloud()
            ->putFileAs('', $request->photo, $photo->filename, 'public');

        // データベースエラー時にファイル削除を行うため
        // トランザクションを利用する
        DB::beginTransaction();

        try {
            Auth::user()->photos()->save($photo);
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
        return response($photo, 201);
    }

    /**
     * 写真詳細
     * @param string $id
     * @return Photo
     */
    public function show(string $id)
    {
        $photo = Photo::where('id', $id)->with(['owner', 'reviews.author', 'likes'])->first();

        return $photo ?? abort(404);
    }

    /**
     * レビュー投稿
     * @param Photo $photo
     * @param StoreReview $request
     * @return \Illuminate\Http\Response
     */
    public function addReview(Photo $photo, StoreReview $request)
    {
        $review = new Review();
        $review->content = $request->get('content');
        $review->user_id = Auth::user()->id;
        $photo->reviews()->save($review);

        // authorリレーションをロードするためにコメントを取得しなおす
        $new_review = Review::where('id', $review->id)->with('author')->first();

        return response($new_review, 201);
    }

    /**
     * いいね
     * @param string $id
     * @return array
     */
    public function like(string $id)
    {
        $photo = Photo::where('id', $id)->with('likes')->first();

        if (!$photo) {
            abort(404);
        }

        // 一度detachしてからattachすることで一個しかいいねが付かない
        $photo->likes()->detach(Auth::user()->id);
        $photo->likes()->attach(Auth::user()->id);

        return ["photo_id" => $id];
    }

    /**
     * いいね解除
     * @param string $id
     * @return array
     */
    public function unlike(string $id)
    {
        $photo = Photo::where('id', $id)->with('likes')->first();

        if (!$photo) {
            abort(404);
        }

        $photo->likes()->detach(Auth::user()->id);

        return ["photo_id" => $id];
    }
}
