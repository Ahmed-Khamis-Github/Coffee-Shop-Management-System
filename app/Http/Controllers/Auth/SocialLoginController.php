<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    public function redirect($provider){
       return Socialite::driver($provider)->redirect();
    }


    public function callback($provider){

        $provider_user = Socialite::driver($provider)->stateless()->user();

        $user = User::where([
            'provider' => $provider,
            'provider_id' => $provider_user->id,
            
        ])->first();

        if(!$user){
            $user = User::create([
                'name' => $provider_user->name,
                'email' => $provider_user->email,
                'password' => Hash::make(Str::random(8)),
                'provider' => $provider,
                'provider_id' => $provider_user->id,
                'provider_token' => $provider_user->token,
            ]);
        };

        Auth::login($user);

        return redirect()->route('front.home');
    }
}