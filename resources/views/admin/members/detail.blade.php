@extends('layouts.app')

@section('title', 'Detail Page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-header px-4 py-4">
                <div class="">
                    <h3 class="mb-0 h4 font-weight-bolder">Data Member</h3>
                    <p class="mb-4">
                        Detail Data Member
                    </p>
                </div>
                
                <div class="card">
                    <div class="row card-body mt-3">
                        <div class="col-md-8">
                            <h6 class="mb-0">Name Member</h6>
                            <p class="text-sm">{{ $user->name }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Nomor Telepon</h6>
                            <p class="text-sm">{{ $user->telp }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Alamat</h6>
                            <p class="text-sm">{{ $user->alamat }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Team</h6>
                            <p class="text-sm"> {{ $user->jenisProject ? $user->jenisProject->name : '-' }}</p>
                        </div>

                        <div class="col-md-8">
                            <h6 class="mb-0">Projek</h6>
                            <p class="text-sm">{{ $user->id_project }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
