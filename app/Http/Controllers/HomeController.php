<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function searchWords(Request $request)
    {
        if (isset($request->search)) {
            $searchWords = $request->search;

            $orderByProducts  = "CASE WHEN title = '".$searchWords."' THEN 0 ELSE 1 END,";
            $orderByProducts .= "CASE WHEN description = '".$searchWords."' THEN 0 ELSE 1 END,";
            $orderByProducts .= "CASE WHEN text = '".$searchWords."' THEN 0 ELSE 1 END";

            $products = Product::where('title','LIKE','%'.$searchWords.'%')->orwhere('description','LIKE','%'.$searchWords.'%')->orwhere('text','LIKE','%'.$searchWords.'%')->orderByRaw($orderByProducts)
                ->get();
            return view("pages.products.search", compact(["products"]));
        } else{

            return view("home");

        }

    }

}
