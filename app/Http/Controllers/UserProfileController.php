<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
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

        return view('user.profile.index')->with('user', $user);
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
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('user.profile.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user = Auth::user();

        if ($user->email == request('email') || $user->password == request('password')) {

            $this->validate(request(), [
                'name'          =>  'required|string',
                'address'       =>  'required',
                'phone_number'  =>  'required|min:11',
            ]);

            $user->name = request('name');
            $user->address = request('address');
            $user->phone_number = request('phone_number');

            $user->save();

            Session::flash('success', 'Profile updated!');
            return redirect()->route('user-profile');
        }

        $this->validate(request(), [
            'name'          =>  'required|string',
            'address'       =>  'required',
            'email'         =>  'required|email|unique:users',
            'phone_number'  =>  'required|min:11',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->address = request('address');
        $user->phone_number = request('phone_number');

        $user->save();

        Session::flash('success', 'Profile updated!');
        return redirect()->route('user-profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);

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
        return redirect()->route('user-profile');
    }
}
