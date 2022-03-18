<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Product;

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

    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->text = $request->text;
        if ($_FILES['img']['name'][0] !== "") {
            $filename = $_FILES['img']['name'];
            $filepath = public_path('/img/');

            $count = count($filename);

            if ($count > 20) {
                return view("pages.products.create");
            } else {
                $product->save();

                for ($i = 0; $i < $count; $i++) {
                    move_uploaded_file($_FILES['img']['tmp_name'][$i], $filepath . $filename[$i]);
                    $image = new Image();
                    $image->img = $filename[$i];
                    $image->product_id = $product->id;
                    $image->save();
                }
                return redirect("/products");

            }
        } else {

            return view("pages.products.create");
        }

    }

    public function edit($id)
    {
        $product = Product::with(["images"])->find($id);

        return view("pages.products.edit", compact(["product"]));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $imgCount = 0;
        foreach ($product->images as $key => $value) {
            $imgCount++;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->text = $request->text;


        if ($_FILES['img']['name'][0] !== "") {
            $filename = $_FILES['img']['name'];
            $filepath = public_path('/img/');
            $count = count($filename);
            $generalCount = $count + $imgCount;
            if ($generalCount > 20) {
                return view("pages.products.edit", compact(["product"]));

            } else {
                $product->save();
                for ($i = 0; $i < $count; $i++) {
                    move_uploaded_file($_FILES['img']['tmp_name'][$i], $filepath . $filename[$i]);
                    $image = new Image();
                    $image->img = $filename[$i];
                    $image->product_id = $product->id;
                    $image->save();
                }
                return redirect("/products");

            }
        } else {

            $product->save();
            return redirect("/products");

        }


    }

    public function delete($id)
    {
        Product::destroy($id);
        Image::where('product_id', '=', $id)->delete();

        return redirect("/products");
    }


}

