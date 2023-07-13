<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('profile',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request,User $user)
    {
        $request->validate([
            "name" => "max:16|required",
            "password" => "min:8|max:32|required"
        ]);

        $new_user = $user->create([
            "name" => $request->name,
            "password" => Hash::make($request->password)
        ]);

        if (!$new_user) {
            return back()->withErrors(['error' => 'Не удалось пройти регистрацию (']);
        }

        Auth::login($new_user, true);
        return redirect()->route('profile');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password],true)) {
            return redirect()->route('profile');
        }
        return back()->withErrors(['error' => 'Не удалось пройти авторизацию (']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('posts.index');
    }
}
