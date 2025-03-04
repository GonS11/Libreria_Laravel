<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(): RedirectResponse
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required', //Añadir luego min:8
        ]);

        //No usar Auth::user() que es el de por defecto, usar Auth::guard('customer')->user(). Cambiar el config/auth.php
        if (Auth::guard('customer')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            request()->session()->regenerate();
            Auth::guard('customer')->login(Auth::guard('customer')->user()); // Asegura que Laravel guarde la sesión
            return redirect()->route('main')->with('success', 'Logged in succesfully!');
        }


        return redirect()->route('login')->withErrors(['email' => 'No matching user found with the provided email and password']);
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'firstname' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|confirmed', //Añadir luego min:8
            'type' => 'required|in:basic,premium',
        ]);

        //Iba a hacer esto: ::create($request->all()); pero hay que hashear
        $customer = Customer::create([
            'firstname' => $validated['firstname'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => $validated['type'],
        ]);

        return redirect()->route('login')->with('success', 'Account created succesfully');
    }

    public function logout(): RedirectResponse
    {
        //Auth::guard('customer')->logout();
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken(); //Token csrf

        return redirect()->route('login')->with('success', 'Logged out succesfully');
    }
}
