<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            "email"=> "required",
            "password"=> "required"
        ],[
            "email.required"=> "Email Wajib Di isi",
            "password.required"=> "Password Wajib Di isi"
        ]);

        $isLogin =[
            'email' => $request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt($isLogin)) {

            if(Auth::user()->role =='karyawan'){
                return redirect('/karyawan');
            }elseif(Auth::user()->role == 'client'){
                return redirect('/client');
            }
            return redirect('/dashboard');
        }else{
            return redirect('/auth/login')->withErrors('Username atau Password Salah !!')->withInput();
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('auth/login');
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
}
