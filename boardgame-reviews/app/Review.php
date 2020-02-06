<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** JSONに含める属性 */
    protected $visible = [
        'author', 'content',
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
}
