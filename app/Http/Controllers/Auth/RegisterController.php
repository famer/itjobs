<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function registerForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $type = ($request->publish_positions == 'yes' ? 'employer' : 'employee');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $type,
        ]);

        auth()->attempt($request->only('email', 'password'));

        auth()->user()->sendEmailVerificationNotification();

        return redirect()->route('home');
    }
}
