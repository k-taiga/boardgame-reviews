<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Shop;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /** JSONに含めるアクセサ */
    protected $appends = [
        'favorite_shops'
    ];

    /** JSONに含める属性(実際に返ってくる値) */
    protected $visible = [
        'id', 'name',  'email', 'photos', 'favorite_shops', 'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * リレーションシップ - shopsテーブル
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Shop', 'likes')->withTimestamps();
    }

    /**
     * リレーションシップ - photosテーブル
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasOne('App\UserPhoto');
    }

    /**
     * アクセサ - likes_count
     * @return string
     */
    public function getFavoriteShopsAttribute()
    {
        $shop_photo = [];
        foreach ($this->favorites as $shop) {
            $shop_photo[] = Shop::where('id', $shop["id"])->with(['photos'])->first();
        }

        return $shop_photo;
    }
}
