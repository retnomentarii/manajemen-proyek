<?php

namespace App\Http\Controllers;

use App\Models\JenisProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
       
        if ($user->role === 'admin' || $user->role === 'karyawan') {

            $totalProjects = Project::count();

            $totalMembers = User::where('role', 'karyawan')->count(); 
    
            $totalClients = User::where('role', 'client')->count(); 
    
            $totalProjectTypes = JenisProject::count(); 
    
            $currentProjects = Project::with(['user', 'jenisProject', 'member'])->latest()->take(3)->get(); 
    
            $currentClients = User::where('role', 'client')->with('jenisProject')->latest()->take(3)->get(); 
            $currentMember = User::where('role', 'karyawan')->with('jenisProject')->latest()->take(3)->get(); 
    
            return view('dashboardAdmin' , compact('totalProjects', 'totalMembers', 'totalClients', 'totalProjectTypes', 'currentProjects', 'currentClients', 'currentMember'));

        } elseif ($user->role === 'client') {

            $projects = Project::with(['user', 'jenisProject', 'member'])
            ->where('client_id', $user->id)
            ->get()->groupBy('status');
        return view('dashboardClient', compact('projects'));
        } else { 
            return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }


    }

    

}
