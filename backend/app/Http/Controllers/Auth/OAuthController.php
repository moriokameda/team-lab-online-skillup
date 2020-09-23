<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class OAuthController
 * @package App\Http\Controllers\Auth
 */
class OAuthController extends Controller
{
    /**
     * ソーシャルログインページにリダイレクト
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function socialOAuth(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * 各サイトからのコールバック
     * @param string $provider
     */
    public function handleProviderCallback(string $provider, Request $request)
    {
        $userSocial = Socialite::driver($provider)->user();
        $user = User::where(["email" => $userSocial->getEmail()])->first();
        /**
         * ユーザがすでに登録済か確認
         */
        if ($user) {
            Auth::login($user);
            return redirect()->action('InstagramController@index');
        }

        /**
         * 新規登録画面
         */
        $request->session()->put('provider_user',$user);
        return redirect('register');
    }
}
