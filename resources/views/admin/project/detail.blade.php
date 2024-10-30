@extends('layouts.app')

@section('title', 'Detail Project')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Detail Project: {{ $project->name }}</h3>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Informasi Proyek</h5>
        </div>
        <div class="card-body">
            <p><strong>Jenis Proyek:</strong> {{ $project->jenisProject->name ?? 'Tidak Diketahui' }}</p>
            <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($project->deadline)->format('d F Y') }}</p>
            <p><strong>Harga:</strong> {{ $project->harga }}</p>
            <p><strong>Keterangan:</strong> {{ $project->keterangan }}</p>
            <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
            <p><strong>Dibuat Oleh:</strong> {{ $project->user->name ?? 'Tidak Diketahui' }}</p>

            <h6>Anggota Proyek:</h6>
            <ul>
                @foreach ($project->member as $member)
                    <li>{{ $member->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali ke Daftar Proyek</a>
            @if ((auth()->check() && auth()->user()->role === 'admin') || auth()->user()->role === 'karyawan')
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit Proyek</a>
            @endif
        </div>
    </div>
</div>
@endsection
