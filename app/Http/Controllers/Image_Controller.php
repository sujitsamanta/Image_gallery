<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;
use Illuminate\Support\Facades\File;

class Image_Controller extends Controller
{
    function uplode_image(Request $request){
        $path=$request->file('file')->store('images','public');
        $patharrey=explode('/',$path);
        $img_name=$patharrey[1];

        $img = new image();
        $img->path=$img_name;
        $img->title=$request->title;

        $img->save();
        
        return redirect()->back()->with('alert','succesful' );
        // return $img_name;
    }

    function view(){
        $imgdata = image::all();
        return view('image_view_section',['imgdata'=>$imgdata]);
    }

    function edit_page(Request $request){
        $image=image::findOrFail($request->id);

        return view('image_edit_section',['image'=>$image]);
    }

    function update(Request $request){
        
        $path=$request->file('file')->store('images','public');
        $patharrey=explode('/',$path);
        $img_name=$patharrey[1];

        $image=image::findOrFail($request->id);

        // old image delete
        File::delete(public_path('storage/images/'.$image->path));

        // new image update
        $image->title=$request->title;
        $image->path=$img_name;
        $image->save();

        return redirect()->back()->with('alert','succesful' );
    }

    function delete(Request $request){

        $image=image::findOrFail($request->id);
       
        File::delete(public_path('storage/images/'.$image->path));

        $image->delete();

        return redirect()->back()->with('alert','succesful' );
    }

}