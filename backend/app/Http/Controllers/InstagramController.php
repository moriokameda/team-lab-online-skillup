<?php


namespace App\Http\Controllers;


use App\Models\instagram\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view("home", ["users" => $users, "photos" => $photos]);
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
        $this->validate($request, [
            'photo' => [
                'required',
                'image',
                'mimes:jpeg,png',
            ],
            'caption' => [
                'max:255',
                'min:1',
            ]
        ]);
        if (!$request->file('photo')->isValid([])) {
            return redirect()->back()->withInput()->withErrors();
        }
        $userId = Auth::id();
        $photo = base64_encode(file_get_contents($request->photo->getRealPath()));

        return redirect("/instagram");
    }


    /**
     * プロフィールを表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfile()
    {
        return view("instagram/profile");
    }


    /**
     * いいねユーザ一覧を表示
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLikes()
    {
        return view("instagram/likes");
    }
}
