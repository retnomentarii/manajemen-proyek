<?php

namespace App\Http\Controllers;

use App\Models\JenisProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('jenisProject', 'projects')->where('role', 'karyawan')->get();
        return view('admin.members.index', compact('users'));
    }
    
    
    public function karyawan(){
        $users = User::all();
        return view('dashboardAdmin', compact('users'));
    }
    public function client(){
        $users = User::all();
        return view('dashboardClient', compact('users'));
    }

    
    public function create()
    {
        $jenisProjects = JenisProject::all();
        return view('admin.members.create', compact('jenisProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telp' => 'nullable|string',
            'alamat' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'id_project' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,   
            'email' => $request->email,
            'password'=> $request->password,
            'role' => 'karyawan',
            'id_project' => $request->id_project,
        ]);

        return redirect()->route('members.index')->with('success', 'User created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.members.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $jenisProject = JenisProject::all();
        $user = User::findOrFail($id);
        return view('admin.members.edit', compact('user', 'jenisProject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id, // Pastikan email unik kecuali untuk member yang sedang diupdate
            'id_project' => 'required|integer',
        ]);
    
        // Temukan member berdasarkan ID
        $user = User::findOrFail($id);
    
        // Update data user
        $user->update([
            'name' => $request->name,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'role' =>'karyawan',
            'id_project' => $request->id_project,
        ]);
    
        // Redirect ke halaman daftar member dengan pesan sukses
        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
