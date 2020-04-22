<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    // 複数代入のため
    protected $fillable = ['ward_id' , 'shop_name', 'address', 'boardgame_num', 'content', 'home_url', 'price', 'byo_flg'];

    /** JSONに含めるアクセサ */
    protected $appends = [
        'likes_count', 'liked_by_user',
    ];

    /** JSONに含める属性 */
    protected $visible = [
        'id', 'shop_name', 'ward_id' , 'address', 'boardgame_num', 'content', 'home_url',
        'photos', 'reviews', 'price','likes_count', 'liked_by_user',
    ];

    protected $perPage = 18;

    // const HOUR = 10;

    // protected $attributes = [
    //     // 定数を設定
    //     'bussiness_hours' => self::HOUR,
    // ];

    // ここから下はリレーション
    // withで呼び出す
    /**
     * リレーションシップ - photosテーブル
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photos()
    {
        return $this->hasOne('App\Photo');
    }

    /**
     * リレーションシップ - reviewsテーブル
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Review')->orderBy('id', 'desc');
    }

    /**
     * リレーションシップ - likesテーブル
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    // ここから下はアクセサ　get~Attributeという形式
    // このアクセサを利用するには、getとAttributeを取り除いたスネークケースになる
    /**
     * アクセサ - likes_count
     * @return int
     */
    public function getLikesCountAttribute()
    {
        return $this->likes->count();
    }

    /**
     * アクセサ - liked_by_user
     * @return boolean
     */
    public function getLikedByUserAttribute()
    {
        if (Auth::guest()) {
            return false;
        }

        return $this->likes->contains(function ($user) {
            return $user->id === Auth::user()->id;
        });
    }
}
