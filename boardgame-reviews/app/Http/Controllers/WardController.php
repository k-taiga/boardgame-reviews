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

    /**
     * 23区毎のページでのソート
     * @param string $id
     * @return Shop
     */
    public function sort(string $id, string $sort)
    {
        clock($id);
        clock($sort);
        if ($sort === "review") {
            $shops =
                // 1.reviewsテーブルと外部結合し23区で絞り込み
                Shop::select('shops.*')->leftjoin('reviews', 'shops.id', '=', 'reviews.shop_id')->where('ward_id', $id)
                // 2.distinctにかけそのshopのモデルに紐づくphotosとlikesを取得、
                ->distinct()->with(['photos', 'likes'])
                // 3.そして結合したreviewsをサブクエリでcountしその数が大きい順にソート
                ->withCount('reviews')->orderBy('reviews_count', 'desc')->paginate();
        } elseif ($sort === "follower") {
            $shops =
                Shop::select('shops.*')->leftjoin('likes', 'shops.id', '=', 'likes.shop_id')->where('ward_id', $id)
                ->distinct()->with(['photos', 'likes'])
                ->withCount('likes')->orderBy('likes_count', 'desc')->paginate();
        } else {
            // defaultのソート順が来たら戻す
            $shops = Shop::where('ward_id', $id)->with(['photos', 'likes'])->orderBy(Shop::CREATED_AT, 'desc')->paginate();
        }

        clock($shops);

        return $shops ?? abort(404);
    }

    /**
     * 23区毎のページでのフィルター
     * @param string $id
     * @param Request $request
     * @return Shop
     */
    public function filter(string $id, Request $request)
    {

        $filter = $request->all();

        clock($filter);
        clock($filter["boardgame"]);
        clock($filter["price"]);
        if ($filter["boardgame"] !== null && $filter["price"] !== null) {
            $shops =
                Shop::where('ward_id', $id)
                ->where('boardgame_num', '>', $filter["boardgame"])
                ->where('price', '>', $filter["price"])
                ->with(['photos', 'likes'])->orderBy(Shop::CREATED_AT, 'desc')->paginate();
        } elseif ($filter["boardgame"] !== null) {
            $shops =
                Shop::where('ward_id', $id)
                ->where('boardgame_num', '>', $filter["boardgame"])
                ->with(['photos', 'likes'])->orderBy(Shop::CREATED_AT, 'desc')->paginate();
        } elseif ($filter["price"] !== null) {
            $shops =
                Shop::where('ward_id', $id)
                ->where('price', '>', $filter["price"])
                ->with(['photos', 'likes'])->orderBy(Shop::CREATED_AT, 'desc')->paginate();
        }

        clock($shops);

        return $shops ?? abort(404);
    }

    /**
     * 23区毎のページでのfilterとsort
     * @param string $id
     * @param Request $request
     * @return Shop
     */
    public function filterSort(string $id, string $sort, Request $request)
    {

        clock($id);
        clock($sort);
        // clock($filter);
        // clock($request->all());

        $filter = $request->all();

        clock($filter["boardgame"]);

        // boardgameの絞り込みとそれのsort
        if ($sort === "review" && $filter["boardgame"] !== "") {
            $shops =
                Shop::select('shops.*')->leftjoin('reviews', 'shops.id', '=', 'reviews.shop_id')->where('ward_id', $id)
                ->where('boardgame_num', '>', $filter["boardgame"])
                ->distinct()->with(['photos', 'likes'])
                ->withCount('reviews')->orderBy('reviews_count', 'desc')->paginate();
        } elseif ($sort === "follower" && $filter["boardgame"] !== "") {
            $shops =
                Shop::select('shops.*')->leftjoin('likes', 'shops.id', '=', 'likes.shop_id')
                ->where('ward_id', $id)
                ->where('boardgame_num', '>', $filter["boardgame"])
                ->distinct()->with(['photos', 'likes'])
                ->withCount('likes')->orderBy('likes_count', 'desc')->paginate();
        }

        // clock($shops);

        return $shops ?? abort(404);
    }
}
