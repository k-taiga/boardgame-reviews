<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** JSONに含める属性 */
    protected $visible = [
        'author', 'content', 'date'
    ];

    /** JSONに含めるアクセサ */
    protected $appends = [
        'date'
    ];

    /**
     * リレーションシップ - usersテーブル
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id', 'id', 'users');
    }

    /**
     * リレーションシップ - shopsテーブル
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop_review()
    {
        return $this->belongsTo('App\Shop', 'shop_id', 'id', 'shops');
    }

    /**
     * アクセサ - liked_by_user
     * @return boolean
     */
    public function getDateAttribute()
    {

        return $this->created_at->format('Y/m/d');
    }
}
