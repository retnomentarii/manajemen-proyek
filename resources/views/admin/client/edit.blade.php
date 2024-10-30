@extends('layouts.app')

@section('title', 'Edit Client Page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header px-2 py-2">
                    <div class="">
                        <h3 class="mb-0 h4 font-weight-bolder">Edit Data Client</h3>
                        <p class="mb-4">Edit Data Client</p>

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
                            <form action="{{ route('client.update.single', $client->id) }}" method="POST">
                                @csrf
                                @method('POST')

                                <label class="form-label">Nama Client</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $client->name) }}" required>
                                </div>

                                <label class="form-label">Nomor Telepon</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="telp" class="form-control"
                                        value="{{ old('telp', $client->telp) }}" required>
                                </div>

                                <label class="form-label">Alamat</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ old('alamat', $client->alamat) }}" required>
                                </div>

                                <label class="form-label">Email</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $client->email) }}" required>
                                </div>

                                <label class="form-label">Agency</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="text" name="instansi" class="form-control"
                                        value="{{ old('instansi', $client->instansi) }}" required>
                                </div>

                                <div class="text-end mt-5">
                                    <a href="{{ route('client.index') }}" class="btn btn-light">Cancel</a>
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
