<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
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

        return view('merchant.index');
    }

    public function Ads()
    {

        return view('merchant.ads');
    }

    public function editProfile()
    {
        $admin = Admin::find(Auth::id());

        return view('merchant.edit-profile')->with('admin', $admin);
    }

    public function adminDeleteProfile($id)
    {
        $admin = Admin::find(Auth::id());
        $admin->delete();

        Session::flash('success', 'Account deactivated');

        return redirect()->route('welcome');
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
        //
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
        //
    }
}
