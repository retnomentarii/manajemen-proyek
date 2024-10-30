@extends('layouts.app')

@section('title', 'Edit Member Page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header px-2 py-2">
                    <h3 class="mb-0 h4 font-weight-bolder">Edit Data Member</h3>
                    <p class="mb-4">
                        Edit Data Member
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
                    <div class="card-body ">
                        <form action="{{ route('members.update.single', $user->id) }}" method="POST">
                            @csrf
                            @method('post')

                            <label class="form-label">Nama Member</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>
                            <label class="form-label">Nomor Telepon</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="telp" class="form-control"
                                    value="{{ old('name', $user->telp) }}" required>
                            </div>
                            <label class="form-label">Alamat</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="alamat" class="form-control"
                                    value="{{ old('name', $user->alamat) }}" required>
                            </div>

                            <label class="form-label">Email</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            
                            <label class="form-label">Teams</label>
                            <div class="input-group input-group-outline mb-3">
                                <select name="id_project" class="form-select" required>
                                    <option value="">Pilih Teams</option>
                                    @foreach ($jenisProject as $project)
                                        <option value="{{ $project->id }}"
                                            {{ $user->id_project == $project->id ? 'selected' : '' }}>{{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-end mt-5">
                                <a href="{{ route('members.index') }}" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
