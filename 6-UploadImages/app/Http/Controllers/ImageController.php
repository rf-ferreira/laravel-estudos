<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('welcome', compact('images'));
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            "image" => "mimes:jpg,png,jpeg|max:5048",
            "description" => 'required'
        ]);

        $image = $request->image;
        $description = $request->description;
        $imageName = time() . '-' . md5($image) . '.' . $image->extension();
        $image->move(public_path('images'),$imageName); // move image to public `images` folder

        // $request->file('image')->storeAs('images', $imageName); // store image on storage's `public/images` folder
        
        // Storage::disk('public')->putFile('images', $request->file('image'));

        Image::create([
            "name" => $imageName,
            "description" => $description
        ]);

        return redirect()->route('index');
    }
}
