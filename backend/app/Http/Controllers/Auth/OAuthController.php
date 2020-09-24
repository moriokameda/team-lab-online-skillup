<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function handleProviderCallback(Request $request, string $provider)
    {
        $userSocial = Socialite::driver($provider)->user();
        $user = User::where(["email" => $userSocial->getEmail()])->first();

        /**
         * ユーザがすでに登録済か確認
         */
        if ($user) {
            Auth::login($user);
            return redirect()->route('instagram');
        }

        /**
         * 新規登録画面
         */
        $request->session()->put('provider_token', $userSocial->token);
        $request->session()->put('provider', $provider);
        return redirect()->route('oauth.register',[
          'provider' => $provider
        ]);
//        return view('auth/register', [
//            'provider_id' => $userSocial->getId(),
//            'nickname' => $userSocial->getNickname(),
//            'name' => $userSocial->getName(),
//            'email' => $userSocial->getEmail(),
//            'avatar' => $userSocial->getAvatar()
//        ]);
    }

    /**
     * 新規登録画面にOAuthの値をプリセットして表示
     * @param Request $request
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {
        $provider = $request->session()->get('provider');
        $token = $request->session()->get('provider_token');
        $user = Socialite::driver($provider)->userFromToken($token);

        return view('auth/register', [
            'provider_id' => $user->id,
            'nickname' => $user->nickname,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar
        ]);
    }

}
