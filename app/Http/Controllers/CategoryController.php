<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoryProducts()
    {
        $categories = Category::all();
        $products = Product::where('category_id', request()->id)->latest()->paginate(9);

        return view('shop.index')->with([
                'categories'    => $categories,
                'products'      => $products
            ]);
    }

    public  function showCates($category)
    {
        $categories = Category::all();
        $products = Product::with('categories')->whereHas('categories', function ($query) use ($category)
        {
            $query->where('slug', $category);
        })->inRandomOrder()->paginate(9);

        return view('shop.index')->with('products', $products)->with('categories', $categories);
    }
}
