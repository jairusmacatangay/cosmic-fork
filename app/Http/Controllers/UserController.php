<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as ModelUser;
use Carbon\Carbon;
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

    public function viewRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobileNumber' => 'required|numeric|digits:10',
            'birthday' => 'required|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
            'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'confirmPassword' => 'required|same:password',
        ], [
            'birthday.before' => 'You must be at least 18 years old.',
            'password.regex' => 'Your password must be at least 8 characters long, contain at least one number and symbol and have a mixture of uppercase and lowercase letters.'
        ]);
    }
}
