<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\hash;
class SocialController extends Controller
{
    public function redirect() {
        return Socialite::driver('github')->redirect();
  }
    
   public function callback() {
      $githubUser = Socialite::driver('github')->stateless()->user();
 
      $user = User::updateOrCreate([
         'github_id' => $githubUser->id,
      ], [
           'name' => $githubUser->nickname,
           'email' => $githubUser->email,
          'github_token' => $githubUser->token,
           'github_refresh_token' => $githubUser->refreshToken,
         'password'=>Hash::make(Str::password(30))
        //  $githubUser->name ?? $githubUser->nickname,
      ]);
     
     Auth::login($user);
     
      return redirect('/');
    }
}
  


    // public function redirectToProvider($provider)
    //  {
    //      return Socialite::driver($provider)->redirect();
    //  }

    //  public function handleProviderCallback($provider)
    //  {
    //      $user = Socialite::driver($provider)->user();   

    //   }
 
