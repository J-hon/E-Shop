<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminProfileController extends Controller
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

        return view('merchant.profile.index')->with('admin', $admin);
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
    public function edit(Admin $admin)
    {
        $admin = Auth::user();

        return view('merchant.profile.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Admin $admin)
    {
        $admin = Auth::user();

        if ($admin->email == request('email') || $admin->password == request('password')) {

            $this->validate(request(), [
                'name'          =>  'required|string',
                'shop_name'     =>  'max:15',
                'phone_number'  =>  'required|min:11',
            ]);

            $admin->name = request('name');
            $admin->shop_name = request('shop_name');
            $admin->phone_number = request('phone_number');

            $admin->save();

            Session::flash('success', 'Profile updated!');
            return redirect()->route('profile');
        }
        $this->validate(request(), [
            'name'          =>  'required|string',
            'shop_name'     =>  'required|min:2|max:15',
            'email'         =>  'required|email|unique:admins',
            'phone_number'  =>  'required|min:11',
        ]);

        $admin->name = request('name');
        $admin->email = request('email');
        $admin->shop_name = request('shop_name');
        $admin->phone_number = request('phone_number');

        $admin->save();

        Session::flash('success', 'Profile updated!');
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);

        Auth::logout();

        if ($admin->delete()) {
            return redirect()->route('welcome')->with('global', 'Your account has been successfully deactivated!');
        }
    }

    public function updatePassword(Request $request) {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords don't not match
            //return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");

            return response()->json(['errors' => ['current' => ['Current password does not match']]], 422);
        }

        if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");

            return response()->json(['errors' => ['current' => ['New Password cannot be same as your current password']]], 422);
        }

        if (strcmp($request->get('new_password'), $request->get('password_confirmation')) !== 0) {
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");

            return response()->json(['errors' => ['current' => ['Password confirmation wrong!!!']]], 422);
        }

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:6',
            'password_confirmation' => 'required'
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        Session::flash('success', 'Password changed!');
        return redirect()->route('profile');
    }
}
