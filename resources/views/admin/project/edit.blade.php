@extends('layouts.app')

@section('title', 'Edit Project Page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-header px-2 py-2">
                <div class="">
                    <h3 class="mb-0 h4 font-weight-bolder">Edit Project</h3>
                    <p class="mb-4">
                      Edit Project
                    </p>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
            <div class="card">

                <div class="card-body mt-3">
                    <form action="{{ route('project.update.single', $project->id) }}" method="POST">
                        @csrf
                        @method('post')
                    
                        <label class="form-label">Nama Project</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
                        </div>
                    
                        <label class="form-label">Tipe Project</label>
                        <div class="input-group input-group-outline mb-3">
                            <select name="tipe_project_id" class="form-select" required>
                                <option value="">Pilih Tipe Project</option>
                                @foreach($jenisProjects as $jenis)
                                    <option value="{{ $jenis->id }}" {{ (old('tipe_project_id', $project->tipe_project_id) == $jenis->id) ? 'selected' : '' }}>
                                        {{ $jenis->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    
                        <label class="form-label">Deadline</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $project->deadline) }}" required>
                        </div>
                    
                        <label class="form-label">Status Project</label>
                        <div class="input-group input-group-outline mb-3">
                            <select name="status" class="form-select" required>
                                <option value="">Pilih Status</option>
                                <option value="new" {{ (old('status', $project->status) == 'new') ? 'selected' : '' }}>New</option>
                                <option value="in_progress" {{ (old('status', $project->status) == 'in_progress') ? 'selected' : '' }}>On Going</option>
                                <option value="completed" {{ (old('status', $project->status) == 'completed') ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>
                    
                        <label class="form-label">Total Harga Project</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="harga" class="form-control" value="{{ old('harga', $project->harga) }}" required>
                        </div>
                    
                        <label class="form-label">Keterangan</label>
                        <div class="input-group input-group-outline mb-3">
                            <textarea name="keterangan" class="form-control" required>{{ old('keterangan', $project->keterangan) }}</textarea>
                        </div>
                    
                        <label class="form-label">Tambah Member</label>
                        <div class="mb-3">
                            @foreach($users as $user)
                                <div class="form-check">
                                    <input type="checkbox" name="member_ids[]" value="{{ $user->id }}" class="form-check-input" 
                                        {{ (isset($project) && $project->member->contains($user->id)) ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    
                        <div class="text-end mt-5">
                            <a href="{{ route('projects.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
