@extends('layouts.app')

@section('title', 'Tambah Jenis Project Page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header px-4 py-4">
                    <div class="">
                        <h3 class="mb-0 h4 font-weight-bolder">Tambah Jenis Project</h3>
                        <p class="mb-4">
                          Tambah JenisProject
                        </p>
                    </div>

                    <div class="card-body mt-3">
                        <form action="{{ route('jenisProject.store') }}" method="POST">
                            @csrf
                            <label class="form-label">Nama Kategori Project</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="name" class="form-control" required>
                            </div>
            
                            
                             <div class="text-end mt-5">
                                <a href="{{ route('jenisProject.index') }}" class="btn btn-light">Cancel</a>
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
