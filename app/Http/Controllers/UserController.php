<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('register', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function login()
    {
        return view('login', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function userRegistration(UserRequest $request)
    {
        // dd($request->all());
        $reg = new User;

        $reg->name = $request->name;
        $reg->email = $request->email;
        // $reg->password = $request->password;
        $reg->password = bcrypt($request->password);
        $reg->country_id = $request->country_id;
        $reg->dob = \Carbon\Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');
        $reg->gender = $request->gender === "male" ? 1 : 0;
        $reg->role = 1;
        $reg->save();
        return redirect('register')->with('status', 'Register succeed');
    }

    public function userLogIn(Request $request)
    {
        // $user_data = new User;

        // $user_data->email = $request->email;
        // $user_data->password = $request->password;

        $credentials = $request->validate([
            'email'  => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            // dd($credentials);
            return redirect('homePage')->with('status', 'Log in succeed');
        } else {
            // dd($credentials);
            return redirect('homePage')->with('status', 'Log in failed');
        }
    }
}
