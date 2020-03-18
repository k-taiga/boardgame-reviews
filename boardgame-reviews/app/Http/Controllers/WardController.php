<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;


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
}
