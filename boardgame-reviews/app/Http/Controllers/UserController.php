<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\User;
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

        $user_id = Auth::user()->id;

        // ユーザーの写真を保存する処理
        if ($request->photo !== null) {

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

        try {
            if ($request->photo !== null) {
                $icon_url = Storage::cloud()->url($response);
                clock($icon_url);
                $user->icon_url = $icon_url;
                $user->update();
            } else {
                $user->save();
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            // DBとの不整合を避けるためアップロードしたファイルを削除
            Storage::cloud()->delete($icon_url);
            throw $exception;
        }

        return response(200);
    }

    /**
     * ユーザー退会時はお気に入りだけ削除（レビューは退会後も残す)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // validationするRequestクラスを作る
    public function updateCredential(Request $request)
    {
        clock($request->all());

        $request_data = $request->all();

        //現在のパスワードが正しいかを調べる
        if (!(Hash::check($request_data["currentPassword"], Auth::user()->password))) {
            // clock("ifのなか");
            // return response(403);
            $errors = '　現在のパスワードが違います。';
            abort(403, $errors);
        } else {
            clock("elseのなか");
            // clock(Auth::user()->password);
            // $errors = '現在のパスワードが違います。';
            $user = Auth::user();

            if ($request_data["password"] !== null) {

                //現在のパスワードと新しいパスワードが違っているかを調べる
                if (strcmp($request_data["currentPassword"], $request_data["password"]) == 0) {
                    // エラーを返す
                    $errors = '　現在のパスワードと新しく設定するパスワードが同じです。';
                    abort(403, $errors);
                }

                //パスワードを変更
                $user->password = bcrypt($request_data["password"]);
            }

            if ($request_data["email"] !== null) {

                //現在のemailと新しいが違っているかを調べる
                if (strcmp($request_data["email"], Auth::user()->email) == 0) {
                    // エラーを返す
                    $errors = '　現在のメールアドレスと新しく設定するメールアドレスが同じです。';
                    abort(403, $errors);
                }

                //emailを変更
                $user->email = $request_data["email"];
            }

            $user->update();

            return response(200);
        }


        // $user->update();

        // vueでキャッチする
        // return response(403);
    }
}
