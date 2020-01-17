<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoto;
use App\Photo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    public function __construct()
    {
        // 認証に通す
        $this->middleware('auth');
    }
}
