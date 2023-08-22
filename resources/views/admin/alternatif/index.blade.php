@extends('layouts.main')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title">Alternatif</h4>
            <a href="/" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->nama }}</th>
                            @endforeach
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($alternatif as $key => $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->C1 }}</td>
                                <td>{{ $item->C2 }}</td>
                                <td>{{ $item->C3 }}</td>
                                <td>{{ $item->C4 }}</td>
                                <td>{{ $item->C5 }}</td>
                                <td>
                                    <div class="ml-4">
                                        <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="/" class="btn bg-gradient-success btn-sm text-white"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}"><i
                                                    class="fas fa-fw fa-edit"></i></a>
                                            <button type="submit" class="btn bg-gradient-danger btn-sm text-white"
                                                onclick="return confirm('apa kamu yakin akan menghapus data?')"><i
                                                    class="fas fa-fw fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Alternatif</h5>
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

                    <div class="col-lg-12 order-lg-1">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tambah alternatif</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('alternatif.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" class="form-control" name="C1">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" class="form-control" name="C2">
                                    </div>
                                    <div class="form-group">
                                        <label>Kapasitas Mesin(cc)</label>
                                        <input type="text" class="form-control" name="C3">
                                    </div>
                                    <div class="form-group">
                                        <label>Kapasitas Penumpang</label>
                                        <input type="text" class="form-control" name="C4">
                                    </div>
                                    <div class="form-group">
                                        <label>Transmisi</label>
                                        <input type="text" class="form-control" name="C5">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Tambah Data</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Mengisi Pesan yang ingin anda sampaikan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{ $error }}
                    </div>
                    @endforeach
                  @endif

                  @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                      {{ Session('success') }}
                    </div>
                  @endif

                  @foreach($alternatif as $item)

                  @endforeach
                <div class="col-lg-12 order-lg-1">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Alternatif</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('alternatif.update' , $item->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $item->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <input type="number" class="form-control" name="C1" value="{{ $item->C1 }}">
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <input type="number" class="form-control" name="C2" value="{{ $item->C2 }}">
                            </div>
                            <div class="form-group">
                                <label>Pengalaman</label>
                                <input type="number" class="form-control" name="C3" value="{{ $item->C3 }}">
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="number" class="form-control" name="C4" value="{{ $item->C4 }}">
                            </div>
                            <div class="form-group">
                                <label>Status Vaksin</label>
                                <input type="number" class="form-control" name="C5" value="{{ $item->C5 }}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Update Data</button>
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
