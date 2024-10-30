@extends('layouts.app')

@section('title', 'Admin Page')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="">
                <h3 class="mb-0 h4 font-weight-bolder">List Data Member</h3>
                <p class="mb-4">
                    List Data Member
                </p>
            </div> 
            @if ((auth()->check() && auth()->user()->role === 'admin') || auth()->user()->role === 'karyawan')
            <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Member</a>
            @endif
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Team
                                            Member</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Email Address</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Teams</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Project</th>
                                        <th class="text-secondary opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <!-- Author Section -->
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                @php
                                                    $onlineThreshold = now()->subMinutes(5);
                                                    $isOnline =
                                                        $user->last_activity &&
                                                        $user->last_activity >= $onlineThreshold;
                                                @endphp

                                                <span
                                                    class="badge badge-sm {{ $isOnline ? 'bg-gradient-success' : 'bg-gradient-secondary' }}">
                                                    {{ $isOnline ? 'Online' : 'Offline' }}
                                                </span>
                                            </td>

                                            <!-- Job Details -->
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $user->jenisProject ? $user->jenisProject->name : '-' }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    @if($user->projects->isNotEmpty())
                                                        {{ implode(', ', $user->projects->pluck('name')->toArray()) }}
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            
                                                </p>
                                            </td>
                                             
                                            <!-- Edit Action -->
                                            <td class="align-middle">
                                                <a href="{{ route('members.show', $user->id) }}"
                                                    class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="material-symbols-rounded">more_vert</i>
                                                </a>
                                                @if ((auth()->check() && auth()->user()->role === 'admin') || auth()->user()->role === 'karyawan')
                                                <a href="{{ route('members.edit', $user->id) }}"
                                                    class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="material-symbols-rounded">edit_square</i>
                                                </a>
                                                <form action="{{ route('members.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Delete member project" onclick="return confirm('Are you sure you want to delete this member project?');">
                                                        <i class="material-symbols-rounded opacity-5">delete</i>
                                                    </button>
                                                </form>
                                                
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
