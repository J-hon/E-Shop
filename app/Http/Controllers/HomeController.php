<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prods = Product::latest()->take(6)->get();
        $products = Product::inRandomOrder()->take(8)->get();
        $categories = Category::inRandomOrder()->take(6)->get();

        return view('pages.welcome')->with('prods', $prods)->with('products', $products)->with('categories', $categories);
    }
}
