<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function featured(Request $request,int $id)
    {
        $request->validate([
            'image_id' => 'required|exists:images,id'
        ]);
        Image::where('product_id',$id)->first()->update([
            'featured' => false
        ]);
        Image::where('id', $request->image_id)->first()->update([
            'featured' => true
        ]);
        return redirect()->back();
    }
    public function show(int $id)
    {
        return Image::find($id)->imageUrl();
    }
}
