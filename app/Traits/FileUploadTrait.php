<?php

namespace App\Traits;
use Illuminate\Http\Request;
use File;

trait FileUploadTrait {
    function uploadImage(Request $request, $inputName, $oldPath=NULL, $path = "/uploads") {

        if($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $extension = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid().'.'.$extension;

            $image->move(public_path($path), $imageName);

             // Delete Old Image if exists
            if($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path.'/'.$imageName;
        }

        return NULL;
    }


    // Remove Image
    function removeImage(string $path) : void {
        if(File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

}