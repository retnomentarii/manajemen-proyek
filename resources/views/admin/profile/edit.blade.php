@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

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
        
            <div class="card">
                <div class="card-header px-4 py-4">
                    <h3 class="mb-0 h4 font-weight-bolder">Edit Data Profile</h3>
                </div>

                <div class="card-body mt-3">
                    <!-- Form Edit Profile (Nama, Telepon, Alamat, Instansi) -->
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <label class="form-label">Nomor Telepon</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="telp" class="form-control" value="{{ old('telp', $user->telp) }}" required>
                        </div>

                        <label class="form-label">Alamat</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $user->alamat) }}" required>
                        </div>

                        <label class="form-label">Agency</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="instansi" class="form-control" value="{{ old('instansi', $user->instansi) }}" required>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan Profil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header px-4 py-4">
                    <h3 class="mb-0 h4 font-weight-bolder">Edit Email & Password</h3>
                </div>

                <div class="card-body mt-3">
                    <!-- Form Edit Email & Password -->
                    <form action="{{ route('profile.updateEmailPassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label class="form-label">Email</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <label class="form-label">Password Baru</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password" class="form-control">
                        </div>

                        <label class="form-label">Konfirmasi Password</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan Email & Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
