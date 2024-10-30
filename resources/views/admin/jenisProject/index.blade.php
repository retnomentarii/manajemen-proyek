@extends('layouts.app')

@section('title', 'Client Page')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="">
            <h3 class="mb-0 h4 font-weight-bolder">List Data Jenis Project</h3>
            <p class="mb-4">
              List Data Jenis Project
            </p>
          </div>
          <a href="{{ route('jenisProject.create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="row">
       
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Katagori Project</th>
                                    <th class="text-secondary opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($datas->isEmpty())
                                    <tr>
                                        <td colspan="2" class="text-start text-secondary">
                                            Belum ada data yang ditambahkan
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('jenisProject.show', $data->id) }}" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Edit user">
                                              <i class="material-symbols-rounded opacity-5">more_vert</i>
                                            </a>
                                            <a href="{{ route('jenisProject.edit', $data->id) }}" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Edit user">
                                              <i class="material-symbols-rounded">edit_square</i>
                                            </a>
                                            <form action="{{ route('jenisProject.destroy', $data->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="Delete Jenis Project">
                                                    <i class="material-symbols-rounded opacity-5">delete</i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   
    </div>

</div>
@endsection
