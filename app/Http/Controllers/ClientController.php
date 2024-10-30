<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'password'=> 'required',
            'instansi' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'instansi' => $request->instansi,
            'role' => 'client'
        ]);

        return redirect()->route('client.index')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $client)
    {
        return view('admin.client.detail', compact('client'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {
        return view('admin.client.edit', compact('client'));
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
            'email' => 'required',
            'instansi' => 'required',
        ]);

        $client = User::findOrFail($id);
        $client->update([
            'name' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'instansi' => $request->instansi,
            'role' => 'client'
        ]);

        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
