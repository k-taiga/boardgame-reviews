<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'mt_wards';

    /** JSONに含める属性(実際に返ってくる値) */
    protected $visible = [
        'id', 'name'
    ];
}
