<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\User;

use App\UserPhoto;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{

    public function __construct()
    {
        // 認証に通す
        // authに通らなくても使えるもの
        $this->middleware('auth')->except(['show', 'edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // ログインしているユーザーの情報を取得
        $login_user = Auth::user();

        $user_id = $login_user["id"];

        $user = User::where('id', $user_id)->with(['favorites', 'photos'])->first();
        clock($user);

        return $user ?? abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreUser $request)
    {
        // ユーザーの写真を保存する処理
        if ($request->photo !== null) {
            // 写真の拡張子を取得
            $extension = $request->photo->extension();

            $photo = new UserPhoto();

            // インスタンス生成時に割り振られたランダムなID値(prefixはuser)と本来の拡張子を組み合わせてファイル名とする
            $photo->filename = $photo->id . '.' . $extension;

            // S3にファイルを保存する publicで公開
            Storage::cloud()
                ->putFileAs('', $request->photo, $photo->filename, 'public');
            clock($request);
        }


        $user = Auth::user();
        $user->name = $request->get('name');
        // データベースエラー時にファイル削除を行うため
        // トランザクションを利用する
        DB::beginTransaction();

        try {
            if ($request->photo !== null) {
                $user->photos()->save($photo);
                $user->save();
            } else {
                $user->save();
            }

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
