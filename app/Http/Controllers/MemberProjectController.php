<?php

namespace App\Http\Controllers;

use App\Models\MemberProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class MemberProjectController extends Controller
{
    public function index()
    {
        $memberProjects = MemberProject::with(['user', 'project'])->get();
        return view('memberProject.index', compact('memberProjects'));
    }

    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        return view('memberProject.create', compact('users', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        MemberProject::create($request->all());
        return redirect()->route('member.projects.index')->with('success', 'Member project created successfully.');
    }

    public function show(MemberProject $memberProject)
    {
        return view('memberProject.show', compact('memberProject'));
    }

    public function edit(MemberProject $memberProject)
    {
        $users = User::all();
        $projects = Project::all();
        return view('memberProject.edit', compact('memberProject', 'users', 'projects'));
    }

    public function update(Request $request, MemberProject $memberProject)
    {
        $request->validate([
            'member_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $memberProject->update($request->all());
        return redirect()->route('memberProject.index')->with('success', 'Member project updated successfully.');
    }

    public function destroy(MemberProject $memberProject)
    {
        $memberProject->delete();
        return redirect()->route('memberProject.index')->with('success', 'Member project deleted successfully.');
    }
}
