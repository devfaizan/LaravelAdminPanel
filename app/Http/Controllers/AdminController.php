<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminRegister(Request $request)
    {
        $incomingData = $request->validate(
            [
                "name" => ["required", 'regex:/^[a-zA-Z ]+$/'],
                "email" => ["required", Rule::unique("users", "email"), 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
                "password" => ["required", 'min:8', 'max:16'],
            ]
        );
        $incomingData['password'] = bcrypt($incomingData['password']);
        $CurrrentUser = User::create($incomingData);
        Auth::login($CurrrentUser);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/home');
        }
        return redirect('/')->withErrors('Error');
    }

    public function adminLogin(Request $request)
    {
        $incomeData = $request->validate([
            "email" => ["required", 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            "password" => ["required", 'min:8', 'max:16'],
        ]);

        if (Auth::attempt(['email' => $incomeData['email'], 'password' => $incomeData['password']])) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        return redirect('/loginview')->withErrors(['loginError' => 'Invalid email or password. Please try again.']);
    }

    public function adminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminHome(Request $request)
    {
        return view('/home');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $userData = $request->validate([
            "name" => ["required", 'regex:/^[a-zA-Z ]+$/'],
            "phone" => ["required", 'regex:/^[0-9]+$/'],
            "image" => ['image:jpeg,png,jpg,svg'],
        ]);
        $user->name = $userData['name'];
        $user->phone = $userData['phone'];
        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $image_name = time() . '.' . $userData['image']->extension();
            $userData['image']->move(public_path('user'), $image_name);
            $path = "user/" . $image_name;
            $user->image = $path;
        }
        $user->save();
        return view('auth/updateprofile');
    }


    // dont delete
    // public function updateProfile(Request $request)
    // {
    //     $incomeData = $request->validate([
    //         "name" => ["required"],
    //         "phone" => ["required", 'regex:/^[0-9]+$/'],
    //         "image" => ['image:jpeg,png,jpg,svg'],
    //     ]);
    //     $user = Auth::user();
    //     $useriD = Auth::id();
    //     $user->name = $incomeData['name'];
    //     $user->phone = $incomeData['phone'];
    //     $image_name = time() . '.' . $incomeData['image']->extension();
    //     $incomeData['image']->move(public_path('user'), $image_name);
    //     $path = "user/" . $image_name;
    //     $user->image = $path;
    //     $user->save();
    //     return view('/updateprofile');
    // }
}
