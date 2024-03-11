<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Auth;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function updateProfile(ProfileUpdateRequest $request) : RedirectResponse {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr('Profile updated successfully!', 'success');

        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse {



        $user = Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Password updated successfully');
        return redirect()->back();
    }

    function updateAvatar(Request $request){

        // Handle the user upload of avatar
        $imagePath = $this->uploadImage($request, 'avatar');

        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();

        return response()->json(['status' => 'success','message' => 'Avatar updated successfully']);
        // toastr()->success('Avatar updated successfully');
        // return redirect()->back();
    }
}
