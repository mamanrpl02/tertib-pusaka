<?php

namespace App\Http\Controllers\Auth;

use App\Models\Students;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Models\Student; // ganti ke Student

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:students,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // default value
            'class_level' => '10',
            'class_group' => 'A',
            'major' => 'RPL',
            'points' => 0,
        ]);

        event(new Registered($student));

        Auth::guard('student')->login($student);

        return redirect()->intended(route('student.dashboard'));
    }
}
