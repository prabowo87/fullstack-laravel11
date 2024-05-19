<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileDetailUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateDetail(ProfileDetailUpdateRequest $request)
    {
        // dd($request->user());
        $request->user()->fill($request->validated());
        // dd($request->user());
        $fileName=NULL;
        $request->hasFile('photo');
        if($file = $request->hasFile('photo')) {
            
            $file = $request->file('photo') ;
            
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path().'/avatar'.'/' ;
            $file->move($destinationPath,$fileName);
            // return redirect('/uploadfile');
            $request->user()->photo = $fileName;
            $request->user()->is_complete = 'YES';
        }else{
            $request->user()->is_complete = 'NOT';
        }
        
        
        $request->user()->save();
       /*  $request->user()->update([
            'photo' => $fileName,
            'phone' => $request->phone,
            'address' => $request->address,
            'profession' => $request->profession,
        ]); */
    //    return $request->user();
        return Redirect::route('profile.edit')->with('status', 'profile-detail-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
