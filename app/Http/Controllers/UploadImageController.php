<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    function upload_image()
    {
        return view('UploadImage');
    }

    function img_upload(Request $request)
    {
        // return dd($request->all());

        // Full Name: image
        // dd($request->image->getClientOriginalName());

        //Extension
        // dd($request->image->extension());

        // Size
        // dd($request->image->getSize());


        
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $imageName = 'photo' . md5(uniqid()) . time() . '.' . $request->image->extension();

        // dd($imageName);
        // $request->image->move(public_path('assets/uploads'), $imageName);

        // return back()->with('success', 'Image uploaded successfully.')->with('image', $imageName);

        // image upload process (ostad)
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // image upload 
        $imageName = 'photo' . md5(uniqid()) . time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/uploads'), $imageName);

        return redirect()->back();
    }
}
