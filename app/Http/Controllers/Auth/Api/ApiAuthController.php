<?php

namespace App\Http\Controllers\Auth\Api;

use App\ResponseApiTrait;
use App\Http\Controllers\Controller;
use App\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ApiAuthController extends Controller
{
    use ResponseApiTrait;
    public function loginUser(Request $request)
    {
        // $user = User::where('email',$request->email)->first();
        // if ($user){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp', ['server:update'])->plainTextToken; 
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['phone'] =  $user->phone;
            $success['address'] =  $user->address;
   
            return $this->success( "Login Success",
                $success,200 );
        } 
        else{ 
            return $this->error('Unauthorised.', 401);
            // return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    public function store(Request $request) 
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  Rules\Password::defaults()],
        ]);
        // return $validator;
        if(!$validator){
            $this->error($validator->messages(), 401);
        }
        
        // return $user;
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($user){
                

                Auth::login($user);
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('MyApp', ['server:update'])->plainTextToken; 
                $success['name'] =  $user->name;
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;
                $success['phone'] =  $user->phone;
                $success['address'] =  $user->address;
    
                event(new Registered($user));
                DB::commit();
                return $this->success( "Register Success",
                        $success,200 );
            }else{
                DB::rollBack();
                return $this->error('Register Failed.', 401);
            }
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), 401);
        }
        
        
    }
    public function logout(Request $request)
    {
        if (Auth::check()){
            auth()->user()->tokens()->delete();
            return $this->success( "Logout Success",
            auth()->user(),200 );
        }else{
            return $this->error('Unauthorised.', 401);
        }
       
    }
}
