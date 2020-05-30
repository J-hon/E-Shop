<?php

namespace App\Http\Controllers;

use App\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorites::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('favorites.index')->with('favorites', $favorites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        $status = Favorites::where('user_id', $user->id)
                    ->where('product_id', $request->product_id)
                    ->first();

        if (isset($status->user_id) and isset($request->product_id))
        {
            Session::flash('success', 'Item already in favorites.');
            return redirect()->back();
        }

        $favorites = new Favorites();

        $favorites->user_id = $user->id;
        $favorites->product_id = $request->product_id;

        $favorites->save();

        Session::flash('success', 'Added to Favorites!');
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorites = Favorites::find($id);
        $favorites->delete();

        Session::flash('success', 'Removed from Favorites!');
        return redirect()->back();
    }
}
