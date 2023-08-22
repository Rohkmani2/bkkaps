@extends('layouts.main')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="card-title">Kriteria</h4>
            <a href="{{route('kriteria.create')}}" class="btn btn-primary float-right"  data-bs-toggle="modal"
            data-bs-target="#add"><i class="fas fa-fw fa-plus-circle"></i>Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Atribut</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($kriteria as $key=>$item)

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$item->kode}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->bobot}}</td>
                        <td>{{$item->atribut}}</td>
                        <td>
                            <div class="ml-4">
                                <form action="{{ route('kriteria.destroy', $item->id )}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="/" class="btn bg-gradient-success btn-sm text-white"  data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $item->id }}"><i class="fas fa-fw fa-edit"></i></a>
                                    <button type="submit" class="btn bg-gradient-danger btn-sm text-white" onclick="return confirm('apa kamu yakin akan menghapus data?')"><i class="fas fa-fw fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 order-lg-1">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tambah Kriteria</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kriteria.store') }}" method="POST">
                                    @csrf
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif

                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session('success') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>kode</label>
                                        <input type="text" class="form-control" name="kode">
                                    </div>
                                    <div class="form-group">
                                        <label>nama</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>bobot</label>
                                        <input type="text" class="form-control" name="bobot">
                                    </div>
                                    <div class="form-group">
                                        <label>atribut</label>
                                        <input type="text" class="form-control" name="atribut">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Simpan Kriteria</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session('success') }}
                        </div>
                    @endif

                    @foreach($kriteria as $item )

                    @endforeach
                    <div class="col-lg-12 order-lg-1">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Kriteria</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kriteria.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" class="form-control" name="kode"
                                            value="{{ $item->kode }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $item->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Bobot</label>
                                        <input type="text" class="form-control" name="bobot"
                                            value="{{ $item->bobot }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Atribut</label>
                                        <input type="text" class="form-control" name="atribut"
                                            value="{{ $item->atribut }}">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Update kriteria</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
