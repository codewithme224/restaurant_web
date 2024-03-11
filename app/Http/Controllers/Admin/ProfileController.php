<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Auth;
use App\Traits\FileUploadTrait;
use App\Http\Requests\Frontend\ProfilePasswordUpdate;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function index() : View {
        return view('admin.profile.index');
    }

    function updateProfile( ProfileUpdateRequest $request) : RedirectResponse {

        $user = Auth::user();

        $imagePath = $this->uploadImage($request, 'avatar');



        $user->name = $request->name;
        $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile updated successfully');
        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse {



        $user = Auth::user();

        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Password updated successfully');
        return redirect()->back();
    }

   
}
