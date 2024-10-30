<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'client')->get();
        return view('admin.profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
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
    public function edit(User $user)
    {
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'instansi' => 'required',
        ]);

        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }


public function updateEmailPassword(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|confirmed|min:5',
    ]);

    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('profile.index')->with('success', 'Email and password updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
