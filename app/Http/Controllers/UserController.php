<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as ModelUser;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = ModelUser::where([
            ['email', '=', request()->email],
            ['password', '=', request()->password]
            ])->first();

        if (!$user) {
            return response()->json([
                'errors' => ['general' => 'Your provided credentials could not be verified']
            ], 422);
        }

        // Uncomment once registration functionality is implemented

        // if (!auth()->attempt($request)) {
        //     return redirect('/')->with('error', 'Your provided credentials could not be verified');
        // }

        // session()->regenerate();

        return response(null, 200);
    }
}
