@extends('layouts.app')

@section('title', 'Detail Page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header px-2 py-2">
                    <h3 class="mb-0 h4 font-weight-bolder">Detail Data Client</h3>
                    <p class="mb-4">Detail Data Client</p>
                </div>
                <div class="card">
                    <div class="row card-body mt-3">
                        <div class="col-md-8">
                            <h6 class="mb-0">Name Client</h6>
                            <p class="text-sm">{{ $client->name }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Nomor Telepon</h6>
                            <p class="text-sm">{{ $client->telp }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Email</h6>
                            <p class="text-sm">{{ $client->email }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Alamat</h6>
                            <p class="text-sm">{{ $client->alamat }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Agency</h6>
                            <p class="text-sm">{{ $client->instansi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
