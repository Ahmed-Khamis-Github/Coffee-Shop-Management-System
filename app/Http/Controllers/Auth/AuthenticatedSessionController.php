<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {

        return view('front.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
    
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    //admin

    public function adminCreate(): View
    {

        return view('auth.login');
    }



    public function storeAdmin(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->where('role' , "admin")->first();
        

        if(! $user){
            return redirect()->route('dashboardLogin')->with("message" ,"wrong email or password !");
        }

        $request->authenticate() ;
        $request->session()->regenerate() ; 
        return redirect()->route('categories.index') ;



    // if ($user->role=="admin") {
        
    //         $request->authenticate();
    //         $request->session()->regenerate();

            

    //         // $users = User::all();
    //         // return view('dashboard.users.index' , ["users"=>$users]);


    //          return  "authenticated";
    // }



           return abort('404');
        

    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    // public function destroyAdmin(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
