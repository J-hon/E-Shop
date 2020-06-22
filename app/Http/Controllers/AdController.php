<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();

        $categories = Category::all();
        $ads = Product::where('admin_id', $admin->id)
               ->orderBy('created_at', 'desc')
               ->paginate(6);

        return view('merchant.ad.index')
                    ->with('categories', $categories)
                    ->with('ads', $ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('merchant.ad.create')
                    ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'          =>  'required|string',
            'slug'          =>  'required|alpha-dash|min:5|max:255|unique:products',
            'description'   =>  'required|max:100',
            'image'         =>  'required',
            'image.*'       =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'         =>  'required|regex:/^\d+(\.\d{0,2})?$/',
            'category_id'   =>  'required|integer',
        ));

        $product = new Product();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/products/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);

            $product->image = $filename;
        }

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->admin_id = Auth::user()->id;

        $product->save();

        Session::flash('success', 'Ad successfully created!');
        return redirect()->route('ad', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Product::find($id);
        $categories = Category::all();
        $ad_category = Category::find($ad->category_id);

        return view('merchant.ad.edit')
                    ->with('ad', $ad)
                    ->with('categories', $categories)
                    ->with('ad_category', $ad_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Product::find($id);

        if ($ad->slug == request('slug') || 
            $ad->admin_id == request('admin_id') || 
            $ad->price == request('price') || 
            $ad->image == request('image')) 
            {

            $this->validate($request, [
                'name'          =>  'required|string',
                'description'   =>  'required',
                'category_id'   =>  'required|integer'
            ]);

            $ad->name = request('name');
            $ad->description = request('description');
            $ad->category_id = request('category_id');

            $ad->save();

            Session::flash('success', 'Ad updated successfully!');
            return redirect()->route('ad');
        }

        $this->validate($request, [
            'name'          =>  'required|string',
            'slug'          =>  "required|alpha-dash|min:5|max:255|unique:products",
            'image'         =>  'required',
            'image.*'       =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'   =>  'required',
            'price'         =>  'required|regex:/^\d+(\.\d{0,2})?$/',
            'category_id'   =>  'required|integer',
            'admin_id'      =>  'required|integer',
        ]);

        $ad->name = request('name');
        $ad->slug = request('slug');
        $ad->description = request('description');
        $ad->price = request('price');
        $ad->admin_id = Auth::user()->id;
        $ad->category_id = request('category_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/products/'.$filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFileName = $ad->image;

            Storage::delete($oldFileName);

            $ad->image = $filename;
        }

        $ad->save();

        Session::flash('success', 'Ad updated successfully!');
        return redirect()->route('ad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Product::find($id);

        $ad->delete();

        Session::flash('success', 'Ad deleted');
        return redirect()->route('ad');
    }
}
