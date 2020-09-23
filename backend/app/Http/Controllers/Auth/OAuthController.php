<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class OAuthController
 * @package App\Http\Controllers\Auth
 */
class OAuthController extends Controller
{
    //
    /**
     * ソーシャルログインページにリダイレクト
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function socialOAuth(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
