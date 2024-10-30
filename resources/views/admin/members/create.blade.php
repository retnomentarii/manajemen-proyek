@extends('layouts.app')

@section('title', 'Tambah Member Page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header px-4 py-4">
                    <div class="">
                        <h3 class="mb-0 h4 font-weight-bolder">Tambah Data Member</h3>
                        <p class="mb-4">
                          Tambah Data Member
                        </p>
                      </div>
                    <div class="card-body mt-3">
                        <form action="{{ route('members.store') }}" method="POST">
                            @csrf
                            <label class="form-label">Nama Member</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="name" class="form-control" required>
                            </div>
            
                            <label class="form-label">Nomor Telepon</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="telp" class="form-control" required>
                            </div>
            
                            <label class="form-label">Alamat</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="alamat" class="form-control" required>
                            </div>

                            <label class="form-label">Email</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <label class="form-label">Password</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="password" name="password" class="form-control" required>
                            </div>
            
                            <label class="form-label">Teams</label>
                            <div class="input-group input-group-outline mb-3">
                                <select name="id_project" class="form-select" required>
                                    <option value="">Pilih Teams</option>
                                    @foreach($jenisProjects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="text-end mt-5">
                                <a href="{{ route('members.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
