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
        <!-- Status: New -->
        <div class="col-12 col-xl-4">
            <h6 class="mb-0">News ({{ isset($projects['new']) ? $projects['new']->count() : 0 }} )</h6>
            <div class="row">
                @foreach ($projects['new'] ?? [] as $project)
                <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none">
                    <div class="col-12 mt-2">
                        <div class="card h-100">
                            <div class="card-header px-4">
                                <h5 class="mb-0">{{ $project->name }}</h5>
                                <p class="text-sm mb-0 text-capitalize">{{ $project->jenisProject->name ?? '' }}</p>
                            </div>
                            <div class="card-footer p-1 ps-3">
                                <span class="badge badge-sm bg-gradient-success">
                                    {{ \Carbon\Carbon::parse($project->deadline)->format('d F Y') }}
                                </span>
                                <p class="mb-3 px-4 text-sm text-end mt-2">
                                    @if ($project->member)
                                        <span
                                            class="text-success font-weight-bolde             r">{{ $project->member->count() }}</span>
                                        members
                                    @else
                                        <span class="text-danger font-weight-bolder">No member assigned</span>
                                    @endif
                                </p>
                             
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <!-- Status: In Progress -->
        <div class="col-12 col-xl-4">
            <h6 class="mb-0">In Progress
                ({{ isset($projects['in_progress']) ? $projects['in_progress']->count() : 0 }} )</h6>
            <div class="row">
                @foreach ($projects['in_progress'] ?? [] as $project)
                    <div class="col-12 mt-2">
                        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <div class="card-header px-4">
                                <h5 class="mb-0">{{ $project->name }}</h5>
                                <p class="text-sm mb-0 text-capitalize">{{ $project->jenisProject->name ?? '' }}</p>
                            </div>
                            <div class="card-footer p-1 ps-3">
                                <span class="badge badge-sm bg-gradient-success">
                                    {{ \Carbon\Carbon::parse($project->deadline)->format('d F Y') }}
                                </span>
                                <p class="mb-3 px-4 text-sm text-end mt-2">
                                    @if ($project->member)
                                        <span
                                            class="text-success font-weight-bolder">{{ $project->member->count() }}</span>
                                        members
                                    @else
                                        <span class="text-danger font-weight-bolder">No member assigned</span>
                                    @endif
                                </p>
                              
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Status: Done -->
        <div class="col-12 col-xl-4">
            <h6 class="mb-0">Done ( {{ isset($projects['completed']) ? $projects['completed']->count() : 0 }} )</h6>
            <div class="row">
                @foreach ($projects['completed'] ?? [] as $project)
                    <div class="col-12 mt-2">
                        <a href="{{ route('projects.show', $project->id) }}" class="text-decoration-none">
                        <div class="card h-100">
                            <div class="card-header px-4">
                                <h5 class="mb-0">{{ $project->name }}</h5>
                                <p class="text-sm mb-0 text-capitalize">{{ $project->jenisProject->name ?? '' }}</p>
                            </div>
                            <div class="card-footer p-1 ps-3">
                                <span class="badge badge-sm bg-gradient-success">
                                    {{ \Carbon\Carbon::parse($project->deadline)->format('d F Y') }}
                                </span>
                                <p class="mb-3 px-4 text-sm text-end mt-2">
                                    @if ($project->member)
                                        <span
                                            class="text-success font-weight-bolder">{{ $project->member->count() }}</span>
                                        members
                                    @else
                                        <span class="text-danger font-weight-bolder">No member assigned</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

