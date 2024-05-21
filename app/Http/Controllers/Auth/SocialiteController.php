<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\ResponseApiTrait;

class SocialiteController extends Controller
{
    use ResponseApiTrait;
    public function loginSocial(Request $request, string $provider): RedirectResponse
    {
        // $this->validateProvider($request);
        if  (in_array($provider, ["facebook","google","github"])) { 
 
            return Socialite::driver($provider)->stateless()->redirect();
            // return $this->success( "Login Success",
                // ['url'=>Socialite::driver($provider)->stateless()->redirect()],200 );
        }else{
            return $this->error( "Provider not valid",402 );
        }
    }
 
    public function callbackSocial(Request $request, string $provider)
    {
        if  (!in_array($provider, ["facebook","google","github"])) { 
            return $this->error( "Provider not valid",402 );
        }
 
        $response = Socialite::driver($provider)->user();
 
        $user = User::firstOrCreate(
            ['email' => $response->getEmail()],
            ['password' => Str::password()],
            ['email_verified_at' => now()],
        );
        $data = [$provider . '_id' => $response->getId()];
 
        if ($user->wasRecentlyCreated) {
            $data['name'] = $response->getName() ?? $response->getNickname();
 
            // event(new Registered($user));
        }
 
        $user->update($data);
 
        // Auth::login($user, remember: true);
        Auth::login($user,remember: true);
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('MyApp', ['server:update'])->plainTextToken; 
                $success['name'] =  $user->name;
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;
                $success['phone'] =  $user->phone;
                $success['address'] =  $user->address;
    
               
                
                return $this->success( "Register Success",
                        $success,200 );
 
        // return redirect()->intended(RouteServiceProvider::HOME);
    }
 
    /* protected function validateProvider(Request $request): array
    {
        return $this->getValidationFactory()->make(
            $request->route()->parameters(),
            ['provider' => 'in:facebook,google,github']
        )->validate();
    } */
}
