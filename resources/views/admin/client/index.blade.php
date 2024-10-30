@extends('layouts.app')

@section('title', 'Client Page')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="">
            <h3 class="mb-0 h4 font-weight-bolder">List Data Client</h3>
            <p class="mb-4">
              List Data Client
            </p>
          </div>
          @if (auth()->check() && auth()->user()->role === 'admin')
          <a href="{{ route('client.create') }}" class="btn btn-primary">Tambah Client</a>
          @endif
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Nama Client</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Agency</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Tanggal Bergabung</th>
                                    @if (auth()->check() && auth()->user()->role === 'admin')
                                    <th class="text-secondary opacity-7">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $client->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                      <h6 class="text-xs text-secondary mb-0">{{ $client->instansi }}</h6>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <h6 class="text-xs text-secondary mb-0">{{ $client->created_at }}</h6>
                                    </td>
                                    @if (auth()->check() && auth()->user()->role === 'admin')
                                    <td class="align-middle">
                                        <a href="{{ route('client.show', $client->id) }}" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Edit user">
                                          <i class="material-symbols-rounded opacity-5">more_vert</i>
                                        </a>
                                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Edit user">
                                          <i class="material-symbols-rounded">edit_square</i>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
