@extends('layouts.app')

@section('title', 'Detail Jenis Project Page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header px-2 py-2">
                    <div class="">
                        <h3 class="mb-0 h4 font-weight-bolder">Data Jenis Project</h3>
                        <p class="mb-4">
                            Detail Data Jenis Project
                        </p>
                    </div>
                    <div class="card">

                        <div class="row card-body mt-3">
                            <div class="col-md-8">
                                <h6 class="mb-0">Nama</h6>
                                <p class="text-sm">{{ $jenisProject->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
