<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;
use App\Shop;


class WardController extends Controller
{
    /**
     * 23区一覧取得
     */
    public function index()
    {
        $wards = Ward::all();

        clock($wards);

        return $wards;
    }

    /**
     * 23区毎のページ
     * @param string $id
     * @return Shop
     */
    public function show(string $id)
    {

        $shops = Shop::where('ward_id', $id)->with(['photos', 'likes'])->orderBy(Shop::CREATED_AT, 'desc')->paginate();

        clock($shops);

        return $shops ?? abort(404);
    }
}
