@extends('layouts.main')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kelola Pengguna</h4>
                <p class="card-description">
                    <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">Tambah</a>
                    <a href="/buat" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#addImport">Import Excel</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Validasi</th>
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
                                @foreach ($user as $poin)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $poin->email }}</td>
                                        <td>{{ $poin->level }}</td>
                                        <td>{{ $poin->status }}</td>
                                        <td>
                                            <?php if($poin->status == '0') {?>
                                            <a href="/validasi/1/{{ $poin->id }}" class="btn btn-success">Aktifkan</a>
                                            <?php }else{?>
                                            <a href="/validasi/0/{{ $poin->id }}" class="btn btn-danger">Non
                                                Aktifkan</a>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <botton class="btn btn-success"data-bs-toggle="modal"
                                                data-bs-target="#showUser{{ $poin->id }}">Detail</botton>
                                            <botton class="btn btn-info"data-bs-toggle="modal"
                                                data-bs-target="#editUser{{ $poin->id }}">Ubah</botton>
                                            <botton class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delUser{{ $poin->id }}">Hapus</botton>
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
    <div class="modal fade" id="addImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Folder Excel Untuk Menambah Penguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/import" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        <div class="form-group">
                            <input type="file" name='file' id="file" class="form-control" >
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="/user" class="btn btn-danger">Tidak</a>
                        </from>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/daftar" enctype="multipart/form-data">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                id="exampleInputEmail1"  placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name='password' class="form-control" id="exampleInputPassword1"
                                placeholder="Password"  value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="level" class="form-label">Status</label>
                            <select class="form-select @error('level') is-invalid @enderror"
                                aria-label="Default select example" name="level" id="level">
                                <option selected>Silahkan Pilih..</option>
                                <option value="admin">Admin</option>
                                <option value="pencaker">Pencaker</option>
                                <option value="perusahaan">Perusahaan</option>
                            </select>
                            @error('level')
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
                        <a href="/user" class="btn btn-danger">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($user as $val => $poin)
        <!-- Modal -->
        <div class="modal fade" id="showUser{{ $poin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/update/{{ $poin->id }}" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                    id="exampleInputEmail1"  placeholder="Email" value="{{ $poin->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-label">Status</label>
                                <select class="form-select @error('level') is-invalid @enderror"
                                    aria-label="Default select example" name="level" id="level">
                                    <option selected>{{ $poin->level }}</option>
                                </select>
                                @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($user as $val => $poin)
        <!-- Modal -->
        <div class="modal fade" id="editUser{{ $poin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mengubah Data Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/update/{{ $poin->id }}" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                    id="exampleInputEmail1"  placeholder="Email" value="{{ $poin->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name='password' class="form-control" id="exampleInputPassword1"
                                    placeholder="Password"  value="{{ $poin->password }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level" class="form-label">Status</label>
                                <select class="form-select @error('level') is-invalid @enderror"
                                    aria-label="Default select example" name="level" id="level">
                                    <option selected>{{ $poin->level }}</option>
                                    <option value="admin">Admin</option>
                                    <option value="pencaker">Pencaker</option>
                                    <option value="perusahaan">Perusahaan</option>
                                </select>
                                @error('level')
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
                            <a href="/user" class="btn btn-danger">Tidak</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($user as $val => $poin)
        <!-- Modal -->
        <div class="modal fade" id="delUser{{ $poin->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
                        <from method="POST" action="/del/{id}">
                            @method('DELETE')
                            @csrf
                            <a href="/del/{{ $poin->id }}" class="btn btn-danger">Ya</a>
                            <a href="/user" class="btn btn-primary">Tidak</a>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
