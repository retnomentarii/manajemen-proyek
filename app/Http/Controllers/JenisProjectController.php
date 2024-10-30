<?php

namespace App\Http\Controllers;

use App\Models\JenisProject;
use Illuminate\Http\Request;

class JenisProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = JenisProject::all();
        return view('admin.jenisProject.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenisProject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        JenisProject::create([
            'name' => $request->name,
        ]);

        return redirect()->route('jenisProject.index')->with('success', 'Jenis Project added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenisProject = JenisProject::findOrFail($id);
        return view('admin.jenisProject.detail', compact('jenisProject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisProject = JenisProject::findOrFail($id);
        return view('admin.jenisProject.edit', compact('jenisProject'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Temukan jenis project berdasarkan ID
        $jenisProject = JenisProject::findOrFail($id);
    
        // Perbarui data
        $jenisProject->name = $request->input('name');
        $jenisProject->save();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('jenisProject.index')->with('success', 'Jenis project berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisProject $jenisProject)
    {
        $jenisProject->delete();
        return redirect()->route('jenisProject.index')->with('success', 'Jeni project deleted successfully.');
    }
}
