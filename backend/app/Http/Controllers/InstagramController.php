<?php


namespace App\Http\Controllers;


use App\Models\instagram\Photos;
use App\Models\User;
use Illuminate\Http\Request;

class InstagramController extends Controller
{

    /**
     * ホームページ表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $photos = Photos::all();
        return view("home", ["users" => $users]);
    }

    /**
     * 投稿ページ表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPostForm()
    {
        return view("instagram/post-form");
    }


    /**
     * 投稿処理
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postForm(Request $request)
    {
        return redirect("/instagram");
    }
}
