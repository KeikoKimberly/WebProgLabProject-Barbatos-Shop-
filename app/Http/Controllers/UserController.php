<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register()
    {
        return view('register', [
            'categories' => Category::orderBy('name')->get(),
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function registerAdmin()
    {
        return view('registerAdmin', [
            'categories' => Category::orderBy('name')->get(),
            'countries' => Country::orderBy('name')->get(),
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
        $reg = new User;

        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->password = bcrypt($request->password);
        $reg->country_id = $request->country_id;
        $reg->dob = \Carbon\Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');
        $reg->gender = $request->gender === "male" ? 1 : 0;
        $reg->role = 1;
        $reg->save();
        return redirect('register')->with('status', 'Register succeed');
    }

    public function adminRegistration(UserRequest $request)
    {
        $reg = new User;

        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->password = bcrypt($request->password);
        $reg->country_id = $request->country_id;
        $reg->dob = \Carbon\Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');
        $reg->gender = $request->gender === "male" ? 1 : 0;
        $reg->role = 0;
        $reg->save();
        return redirect('register')->with('status', 'Register succeed');
    }

    public function userLogIn(Request $request)
    {

        $credentials = $request->validate([
            'email'  => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('homePage')->with('status', 'Log in succeed');
        } else {
            return redirect('login')->with('status', 'Log in failed');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('homePage');
    }

    public function profile()
    {
        return view('users.profile',[
            'categories' => Category::orderBy('name')->get()
        ]);
    }
}
