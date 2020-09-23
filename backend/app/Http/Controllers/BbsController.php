<?php

namespace App\Http\Controllers;

class BbsController extends Controller
{
//    indexページの表示
    public function index()
    {
        return view('bbs.index');
    }

}
