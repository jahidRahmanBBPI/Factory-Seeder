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
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // image upload 
        $imageName = 'photo' . md5(uniqid()) . time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/uploads'), $imageName);

        return redirect()->back();
    }

    // Multiple image upload
    function upload_multiple_image(){
        return view('Upload_Multiple_Image');
    }

    function img_upload_multiple(Request $request){
        // return dd($request->all());
        // $request->validate([
        //     'images' => 'required',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // foreach ($request->images as $image) {
        //     $imageName = 'photo' . md5(uniqid()) . time() . '.' . $image->extension();
        //     $image->move(public_path('assets/uploads'), $imageName);
        // }

        // return redirect()->back();

        // Multiple image upload process (ostad)
        // return dd($request->all());


        $request->validate([
            'images' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // image upload
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image) {
                $fileNameToStore = 'multiple-photo-'. md5(uniqid()) . time() . '.' . $image->extension();
                $image->move(public_path('assets/uploads'), $fileNameToStore);
            }
        }
        return redirect()->back();
    }
}
