<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    public function delete($id)
    {

        $product = Image::find($id);
        $image_path = 'img/'.$product->img;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();

        return redirect()->back();


    }
}
