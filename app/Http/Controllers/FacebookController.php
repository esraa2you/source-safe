<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Laravel\Socialite\Facades\Socialite;
use Exception;


class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $facebookId = User::where('facebook_id', $user->id)->first();
            dd($user);
            if($facebookId){
                Auth::login($facebookId);
                return redirect('/dashboard');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'role'=>'admin',
                    'password' => encrypt('john123')
                ]);

                Auth::login($createUser);
                return redirect('dashboard');
            }

        } catch (Exception $exception) {
            // dd($exception->getMessage());
        }
    }
}
