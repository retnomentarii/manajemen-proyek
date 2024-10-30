<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenisProject;
use App\Models\MemberProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $projects = Project::with(['user', 'jenisProject', 'member'])->get()->groupBy('status');
        // $projects = Project::all();
    
        return view('admin.project.index', compact('projects', ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $client = User::where('role', 'client')->get();
     $users = User::where('role', 'karyawan')->get(); 
    $jenisProjects = JenisProject::all();
    
    return view('admin.project.create', compact('jenisProjects', 'users', 'client'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tipe_project_id' => 'required|max:255',
            'deadline' => 'required|date',
            'harga' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'status' => 'required|in:new,in_progress,close_to_due,completed',
            'member_ids' => 'required|array', 
            'member_ids.*' => 'exists:users,id',
            'client_id'=>'required'
        ]);

        $project = Project::create($validatedData);
        $project->member()->attach($request->member_ids);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    // public function edit(Project $project)
    // {
    //     return view('project.edit', compact('project'));
    // }
    public function show($id)
    {
        $project = Project::with(['user', 'jenisProject', 'member'])->findOrFail($id);
        return view('admin.project.detail', data: compact('project'));
    }

    public function edit($id)
{
    $users = User::where('role', 'karyawan')->get(); 
    $project = Project::findOrFail($id);
    $jenisProjects = JenisProject::all();
    return view('admin.project.edit', compact('project','users', 'jenisProjects'));
}

public function update(Request $request,$id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'tipe_project_id' => 'required|string|max:255',
        'deadline' => 'required|date',
        'harga' => 'required|string|max:255',
        'keterangan' => 'required|string|max:255',
        'status' => 'required|in:new,in_progress,close_to_due,completed',
        'member_ids' => 'nullable|array',  
        'member_ids.*' => 'exists:users,id',
    ]);
    $project = Project::findOrFail($id);
   
    $project->update($validatedData);

    if ($request->has('member_ids')) {
        $project->member()->sync($request->member_ids);
    } else {
        $project->member()->detach();
    }

    return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
}


    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
