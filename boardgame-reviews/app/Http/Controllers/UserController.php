<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\UserPhoto;
use App\Review;
use App\Http\Requests\StoreUser;
use App\Http\Requests\StorePassword;

class UserController extends Controller
{

    public function __construct()
    {
        // 認証に通す
        // authに通らなくても使えるもの
        $this->middleware('auth')->except(['show']);
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

        $user = User::where('id', $user_id)->with(['favorites'])->first();
        clock($user);

        return $user ?? abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request)
    {

        $user_id = Auth::user()->id;;

        // ユーザーの写真を保存する処理
        if ($request->photo !== null) {
            // // 写真の拡張子を取得
            // $extension = $request->photo->extension();

            // $photo = new UserPhoto();

            // // インスタンス生成時に割り振られたランダムなID値(prefixはuser)と本来の拡張子を組み合わせてファイル名とする
            // $photo->filename = $photo->id . '.' . $extension;

            // $photo->filename = $user_id;

            // S3にファイルを保存する publicで公開
            $response = Storage::cloud()
                ->putFileAs('/user_icon', $request->photo, $user_id, 'public');

            clock($response);
        }

        $user = Auth::user();
        $user->name = $request->get('name');

        // データベースエラー時にファイル削除を行うため
        // トランザクションを利用する
        DB::beginTransaction();

        // try {
        if ($request->photo !== null) {
            // $user->photos()->save($photo);
            $icon_url = Storage::cloud()->url($response);
            clock($icon_url);
            $user->icon_url = $icon_url;
            $user->update();
        } else {
            $user->save();
        }

        DB::commit();
        // } catch (\Exception $exception) {
        //     DB::rollBack();
        //     // DBとの不整合を避けるためアップロードしたファイルを削除
        //     Storage::cloud()->delete($photo->filename);
        //     throw $exception;
        // }
        // リソースの新規作成なので
        // レスポンスコードは201(CREATED)を返却する
        // vueでキャッチする
        return response($icon_url, 201);
    }

    /**
     * ユーザーのお気に入りだけ削除（レビューは退会後も残す)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(StorePassword $request)
    {
        $user_pass = $request->password;
        $user = Auth::user();
        $user_id = $user["id"];

        if ($user['password'] !== $user_pass) {
            $errors = 'パスワードが違います。';
            abort(403, $errors);
        } else {
            DB::table('likes')->where('user_id', $user_id)->delete();
            DB::user('id')->where('id', $user_id)->delete();
            return response(200);
        }
    }
}
