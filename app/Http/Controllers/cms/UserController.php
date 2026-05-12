<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile()
    {
        $user   =   Auth::user();

        return view('cms.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has("image")) {
            if (file_exists("assets/uploads/users/" . $user->image)) {
                File::delete("assets/uploads/users/" . $user->image);
            }

            $imageName  = "user_" . Carbon::now()->timestamp . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assets/uploads/users/'), $imageName);
            $user->image  =  $imageName;
        }

        $user->save();

        Session::flash("success","Data Saved");

        return back();
    }

    public function changePassword(Request $request)
    {
        return view("cms.user.changePasswordForm");
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $hashValue      =   Hash::make($request->password);
        auth()->user()->update(['password' => $hashValue]);
        Session::flash('success', 'Password Changed Successfully');

        return redirect(route('cms.dashboard'));
    }
}
