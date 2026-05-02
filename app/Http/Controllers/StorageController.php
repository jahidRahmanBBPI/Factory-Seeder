<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    function upload_image_storage(){
        return view('storage.SingleImageUpload');
    }

    function img_upload_storage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        return back()->with('success','Image uploaded successfully.')->with('image',$imageName);
    }

    function upload_multiple_image_storage(){
        return view('storage.MultipleImageUpload');
    }

    function img_upload_multiple_storage(Request $request){
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageNames = [];
        foreach ($request->file('images') as $image) {
            $imageName = time().'_'.uniqid().'.'.$image->extension();
            $image->storeAs('public/images', $imageName);
            $imageNames[] = $imageName;
        }

        return back()->with('success','Images uploaded successfully.')->with('images',$imageNames);
    }
}
