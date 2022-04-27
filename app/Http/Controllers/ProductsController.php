<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Image;
use App\Services\ImagMoveService;
use App\Services\ProductService;
use App\Services\ValidateService;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::get();

        return view("pages.products.index", compact("products"));
    }

    public function create()
    {
        return view("pages.products.create");

    }

    public function store( ValidateService $validateService,ImagMoveService $imagMoveService,Request $request)
    {
        $validateService->val($request);


        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->text = $request->text;


        if ($files = $request->file('img')) {


            if (count($files) > 20) {

                return redirect()->route('products.create');

            } else {

                $imagMoveService->moveImg($product,$request);
                return redirect()->route('products.index');


            }
        } else {

            return redirect()->route('products.create');

        }

    }

    public function edit($id)
    {
        $product = Product::with(["images"])->find($id);

        return view("pages.products.edit", compact(["product"]));
    }

    public function update($id,ValidateService $validateService,ImagMoveService $imagMoveService,Request $request)
    {

        $validateService->val($request);

        $product = Product::find($id);

        $imgCount = 0;
        foreach ($product->images as $key => $value) {
            $imgCount++;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->text = $request->text;


        if ($files = $request->file('img')) {

            if (count($files) > 20) {

                return redirect()->route('products.edit')->with(compact(["product"]));

            } else {
                $imagMoveService->moveImg($product,$request);
                return redirect()->route('products.index');

            }
        } else {

            $product->save();
            return redirect()->route('products.index');


        }


    }

    public function delete($id)
    {
        Product::destroy($id);


        $image = Image::where('product_id', $id)->get();
        foreach ($image as $img) {

            $image_path = 'img/' . $img->img;
            if (File::exists($image_path)) {
                File::delete($image_path);
                $img->delete();
            }
        }


        return redirect()->route('products.index');
    }


}

