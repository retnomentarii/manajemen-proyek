@extends('layouts.app')

@section('title', 'Tambah Client Page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header px-4 py-4">
                    <div class="">
                        <h3 class="mb-0 h4 font-weight-bolder">Tambah Data Client</h3>
                        <p class="mb-4">
                          Tambah Data Client
                        </p>
                    </div>

                    <div class="card-body mt-3">
                        <form action="{{ route('client.store') }}" method="POST">
                            @csrf
                            <label class="form-label">Nama Client</label>
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
            
                            <label class="form-label">Agency</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="instansi" class="form-control" required>
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
