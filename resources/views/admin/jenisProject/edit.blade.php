@extends('layouts.app')

@section('title', 'Edit Jenis Project Page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header px-2 py-2">
                    <h3 class="mb-0 h4 font-weight-bolder">Edit Jenis Project</h3>
                    <p class="mb-4">Silakan edit jenis project yang dipilih.</p>
                </div>
               
            </div>
        </div>

        <div class="card">
            <div class="card-body mt-3">
                <form action="{{ route('jenisProject.update.single', $jenisProject->id) }}" method="POST">
                    @csrf
                    @method('POST')
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori Project</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $jenisProject->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="text-end mt-5">
                        <a href="{{ route('jenisProject.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
