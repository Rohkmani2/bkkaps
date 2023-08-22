@extends('layouts.main')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Galeri Kegiatan</h4>
                <p class="card-description">
                    <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addlog">Tambah</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Detail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kegiatan as $run)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td> <img src="{{ asset('storage/' . $run->foto) }}"
                                                style="width:100px; height:100px; object-fit:cover;" alt=""
                                                srcset=""</td>
                                        <td>{{ $run->nama }}</td>
                                        <td>{{ $run->tgl_post }}</td>
                                        <td>{!! Str::limit($run->detail, 50 ) !!}</td>
                                        <td>
                                            <botton class="btn btn-success"data-bs-toggle="modal"
                                                data-bs-target="#showlog{{ $run->id }}">Detail</botton>
                                            <botton class="btn btn-info"data-bs-toggle="modal"
                                                data-bs-target="#editlog{{ $run->id }}">Ubah</botton>
                                            <botton class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#dellog{{ $run->id }}">Hapus</botton>
                                            </from>
                                        </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/cadang" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Kegiatan</label>
                            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control"
                                id="exampleInputUsername1" placeholder="Nama Kegiatan" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleinputDate">Tanggal Kegiatan</label>
                            <input type="date" name='tgl_post' class="form-control" id="image"
                                placeholder="Tanggal Posting" value="{{ old('tgl_post') }}">
                            @error('tgl_post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Detail</label>
                            <textarea type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control"
                                id="editor" placeholder="Detail Kegiatan"
                                value="{{ old('detail') }}"></textarea>
                            @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formFile">Foto</label>
                            <input type="file" name='foto' class="form-control" id="image" placeholder="Password"
                                value="{{ old('foto') }}">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Setujui
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="/loker" class="btn btn-danger">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($kegiatan as $pas => $run)
        <!-- Modal -->
        <div class="modal fade" id="showlog{{ $run->id }}"" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/alih/{id}" enctype="multipart/form-data">
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Kegiatan</label>
                                <input type="text" @error('nama') is-invalid @enderror" name='nama'
                                    class="form-control"  id="exampleInputUsername1" placeholder="Nama Kegiatan"
                                    value="{{ $run->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleinputDate">Tanggal Kegiatan</label>
                                <input type="date" name='tgl_post' class="form-control" id="image"
                                    placeholder="Tanggal Posting"  value="{{ $run->tgl_post }}">
                                @error('tgl_post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Detail</label>
                                <textarea type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control"
                                    id="editor"  placeholder="Detail Kegiatan"
                                    >{{ $run->detail }}</textarea>
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <br><label for="exampleInputConfirmPassword1">Foto</label><br>
                                <img src="{{ asset('storage/' . $run->foto) }}"
                                    style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($kegiatan as $pas => $run)
        <!-- Modal -->
        <div class="modal fade" id="editlog{{ $run->id }}"" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mengedit Data Kegiatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/atur/{{ $run->id }}" enctype="multipart/form-data">
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Kegiatan</label>
                                <input type="text" @error('nama') is-invalid @enderror" name='nama'
                                    class="form-control"  id="exampleInputUsername1" placeholder="Nama Kegiatan"
                                    value="{{ $run->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleinputDate">Tanggal Kegiatan</label>
                                <input type="date" name='tgl_post' class="form-control" id="image"
                                    placeholder="Tanggal Posting"  value="{{ $run->tgl_post }}">
                                @error('tgl_post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Detail</label>
                            <textarea type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control"
                                id="editor"  placeholder="Detail Kegiatan"
                                >{{ $run->detail }}</textarea>
                            @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="formFile">Foto</label>
                                <input type="file" name='foto' class="form-control" id="image"
                                    placeholder="foto" value="{{ $run->foto }}">
                                <img src="{{ asset('storage/' . $run->foto) }}"
                                    style="width:100px; height:100px; object-fit:cover;" alt=""
                                    srcset=""</td>
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Setujui
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <a href="/loker" class="btn btn-danger">Tidak</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($kegiatan as $pas => $run)
        <!-- Modal -->
        <div class="modal fade" id="dellog{{ $run->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Lowongan Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
                        <from method="POST" action="/cabut/{id}">
                            @method('DELETE')
                            @csrf
                            <a href="/cabut/{{ $run->id }}" class="btn btn-danger">Ya</a>
                            <a href="/kegiatan" class="btn btn-primary">Tidak</a>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
