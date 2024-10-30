@extends('layouts.app')

@section('title', 'Dashboard Page')

@section('content')
<div class="container-fluid">
    <div class="flex justify-between items-center mb-2">
        <div class="">
            <h3 class="mb-0 h2 font-weight-bolder">SELAMAT DATANG!! {{ Auth::user()->name }} </h3>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Jumlah Proyek</div>
                <div class="card-body">
                    <h2>{{ $totalProjects }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Jumlah Anggota</div>
                <div class="card-body">
                    <h2>{{ $totalMembers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Jumlah Klien</div>
                <div class="card-body">
                    <h2>{{ $totalClients }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Jumlah Jenis Proyek</div>
                <div class="card-body">
                    <h2>{{ $totalProjectTypes }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Current Project</h5>
            <a href="{{ route('projects.index')}}" class="mb-0 text-decoration-none">See all</a>
        </div>

        <div class="row mt-3">
            @foreach($currentProjects as $project)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header px-4">
                        <h5 class="mb-0">{{ $project->name }}</h5> 
                        <p class="text-sm mb-0 text-capitalize">{{ $project->jenisProject->name }}</p> 
                    </div>
                    <div class="card-footer p-1 ps-3">
                        <span class="badge badge-sm bg-gradient-success">{{ $project->deadline }}</span> 
                        <p class="mb-3 px-4 text-sm text-end mt-2">  @if ($project->member)
                            <span
                                class="text-success font-weight-bolder">{{ $project->member->count() }}</span>
                            members
                        @else
                            <span class="text-danger font-weight-bolder">No member assigned</span>
                        @endif</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Current Client</h5>
            <a href="{{ route('client.index')}}" class="mb-0 text-decoration-none">See all</a>
        </div>

        <div class="row mt-3">
            @foreach($currentClients as $client)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header px-4">
                        <h5 class="mb-0">{{ $client->name }}</h5> 
                        <p class="text-sm mb-0 text-capitalize">  {{ $client->instansi }}</p> 
                    </div>
                    <div class="card-footer p-1 ps-3">
                       <p>{{ \Carbon\Carbon::parse($client->created_at)->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Members</h5>
            <a href="{{ route('members.index')}}" class="mb-0 text-decoration-none">See all</a>
        </div>

        <div class="row mt-3">
            @foreach($currentMember as $member)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header px-4">
                        <h5 class="mb-0">{{ $member->name }}</h5> 
                        <p class="text-sm mb-0 text-capitalize">  {{ $member->jenisProject ? $member->jenisProject->name : '-' }}</p> 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

