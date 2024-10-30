@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Detail Profile</h3>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Profile Information</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama Lengkap</strong> {{ Auth::user()->name }}</p>
            <p><strong>No Telepon:</strong>{{ Auth::user()->telp }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Alamat:</strong>{{ Auth::user()->alamat }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('profile.edit', Auth::user()->id)}}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
