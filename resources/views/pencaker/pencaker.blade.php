@extends('layouts.main')

@section('content')
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PENCARI KERJA</h4>
                        <p class="card-description">
                        <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addpencaker">Tambah</a>
                        </p>
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>NIK</th>
                                    <th>No Handphone</th>
                                    <th>Asal Kabupaten/kota</th>
                                    <th>Alamat Domisili</th>
                                    <th>Agama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Usia</th>
                                    <th>Tinggi Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Status Vaksin</th>
                                    <th>Asal Sekolah</th>
                                    <th>Tahun Lulus</th>
                                    <th>Pengalaman Kerja</th>
                                    <th>Jurusan</th>
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
                                @foreach ($pencaker as $key)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $key->nama }}</td>
                                        <td>{{ $key->jenis_kelamin }}</td>
                                        <td>{{ $key->nik }}</td>
                                        <td>{{ $key->telepon }}</td>
                                        <td>{{ $key->tempat_lhr }}</td>
                                        <td>{{ $key->alamat }}</td>
                                        <td>{{ $key->agama }}</td>
                                        <td>{{ $key->tgl_lahir }}</td>
                                        <td>{{ $key->usia }}</td>
                                        <td>{{ $key->tb }}</td>
                                        <td>{{ $key->bb }}</td>
                                        <td>{{ $key->vaksin }}</td>
                                        <td>{{ $key->sekolah }}</td>
                                        <td>{{ $key->thn_lulus }}</td>
                                        <td>{{ $key->pengalaman }}</td>
                                        <td>{{ $key->jurusan }}</td>

                                        <td>
                                            <botton class="btn btn-success"data-bs-toggle="modal" data-bs-target="#showpencaker{{ $key->id }}">Detail</botton>
                                            <botton class="btn btn-info"data-bs-toggle="modal" data-bs-target="#editpencaker{{ $key->id }}">Ubah</botton>
                                            <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delpencaker{{ $key->id }}">Hapus</botton>
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
    <div class="modal fade" id="addpencaker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="/add" enctype="multipart/form-data">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="mb-3">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" @error('nama') is-invalid @enderror name="nama"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{--  <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" @error('email') is-invalid @enderror name="email"
                        value="{{ old('nama') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>  --}}
                {{--  <div class="mb-3">
                                    <label for="password">Ganti Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kosongi Form Ini Apabila Tidak Ingin Mengubah Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>  --}}
                <div class="mb-3">
                    <label for="name">Tanggal Lahir</label>
                    <input type="date" class="form-control" @error('tgl_lahir') is-invalid @enderror name="tgl_lahir"
                        value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" @error('tempat_lhr') is-invalid @enderror
                        name="tempat_lhr" value="{{ old('tempat_lhr') }}">
                    @error('tempat_lhr')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Jenis Kelamin</label>
                    <input type="text" class="form-control" @error('jenis_kelamin') is-invalid @enderror
                        name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">No Handphone</label>
                    <input type="text" class="form-control" @error('telepon') is-invalid @enderror name="telepon"
                        value="{{ old('telepon') }}">
                    @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">NIK</label>
                    <input type="text" class="form-control" @error('nik') is-invalid @enderror name="nik"
                        value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Alamat</label>
                    <textarea type="text" class="form-control" @error('alamat') is-invalid @enderror name="alamat"
                        value="{{ old('alamat') }}"></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Agama</label>
                    <input type="text" class="form-control" @error('agama') is-invalid @enderror name="agama"
                        value="{{ old('agama') }}">
                    @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Usia</label>
                    <input type="text" class="form-control" @error('usia') is-invalid @enderror name="usia"
                        value="{{ old('usia') }}">
                    @error('usia')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Tinggi Badan</label>
                    <input type="text" class="form-control" @error('tb') is-invalid @enderror name="tb"
                        value="{{ old('tb') }}">
                    @error('tb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Berat Badan</label>
                    <input type="text" class="form-control" @error('bb') is-invalid @enderror name="bb"
                        value="{{ old('bb') }}">
                    @error('bb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Asal Sekolah</label>
                    <input type="text" class="form-control" @error('sekolah') is-invalid @enderror name="sekolah"
                        value="{{ old('sekolah') }}">
                    @error('sekolah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Jurusan</label>
                    <input type="text" class="form-control" @error('jurusan') is-invalid @enderror name="jurusan"
                        value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Tahun Lulus</label>
                    <input type="text" class="form-control" @error('thn_lulus') is-invalid @enderror
                        name="thn_lulus" value="{{ old('thn_lulus') }}">
                    @error('thn_lulus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Pengalaman</label>
                    <input type="text" class="form-control" @error('pengalaman') is-invalid @enderror
                        name="pengalaman" value="{{ old('pengalaman') }}">
                    @error('pengalaman')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Status Vaksin</label>
                    <input type="text" class="form-control" @error('vaksin') is-invalid @enderror name="vaksin" 
                        value="{{ old('vaksin') }}">
                    @error('vaksin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="/loker" class="btn btn-danger">Tidak</a>
            </form>
        </div>
        </div>
    </div>
    </div>

@foreach($pencaker as $key)
<!-- Modal -->
    <div class="modal fade" id="showpencaker{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/add" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <div class="mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" @error('nama') is-invalid @enderror name="nama" required
                            value="{{ $key->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{--  <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" @error('email') is-invalid @enderror name="email" required
                            value="{{ $key->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  --}}
                    {{--  <div class="mb-3">
                                        <label for="password">Ganti Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kosongi Form Ini Apabila Tidak Ingin Mengubah Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>  --}}
                    <div class="mb-3">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" class="form-control" @error('tgl_lahir') is-invalid @enderror name="tgl_lahir" required
                            value="{{ $key->tgl_lahir }}">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control" @error('tempat_lhr') is-invalid @enderror
                            name="tempat_lhr" required value="{{ $key->tempat_lhr }}">
                        @error('tempat_lhr')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Jenis Kelamin</label>
                        <input type="text" class="form-control" @error('jenis_kelamin') is-invalid @enderror
                            name="jenis_kelamin" required value="{{ $key->jenis_kelamin }}">
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">No Handphone</label>
                        <input type="text" class="form-control" @error('telepon') is-invalid @enderror name="telepon" required
                            value="{{ $key->telepon }}">
                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">NIK</label>
                        <input type="text" class="form-control" @error('nik') is-invalid @enderror name="nik" required
                            value="{{ $key->nik }}">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Alamat</label>
                        <textarea type="text" class="form-control" @error('alamat') is-invalid @enderror name="alamat" required
                            value="{{ $key->alamat }}"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Agama</label>
                        <input type="text" class="form-control" @error('agama') is-invalid @enderror name="agama" required
                            value="{{ $key->agama }}">
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Usia</label>
                        <input type="text" class="form-control" @error('usia') is-invalid @enderror name="usia" required
                            value="{{ $key->usia }}">
                        @error('usia')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Tinggi Badan</label>
                        <input type="text" class="form-control" @error('tb') is-invalid @enderror name="tb" required
                            value="{{ $key->tb }}">
                        @error('tb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Berat Badan</label>
                        <input type="text" class="form-control" @error('bb') is-invalid @enderror name="bb"required
                            value="{{ $key->bb }}">
                        @error('bb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Asal Sekolah</label>
                        <input type="text" class="form-control" @error('sekolah') is-invalid @enderror name="sekolah" required
                            value="{{ $key->sekolah }}">
                        @error('sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Jurusan</label>
                        <input type="text" class="form-control" @error('jurusan') is-invalid @enderror name="jurusan" required
                            value="{{ $key->jurusan }}">
                        @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Tahun Lulus</label>
                        <input type="text" class="form-control" @error('thn_lulus') is-invalid @enderror
                            name="thn_lulus" required value="{{ $key->thn_lulus }}">
                        @error('thn_lulus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Pengalaman</label>
                        <input type="text" class="form-control" @error('pengalaman') is-invalid @enderror
                            name="pengalaman" required value="{{ $key->pengalaman }}">
                        @error('pengalaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Status Vaksin</label>
                        <input type="text" class="form-control" @error('vaksin') is-invalid @enderror name="vaksin" required
                            value="{{ $key->vaksin }}">
                        @error('vaksin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endforeach

@foreach($pencaker as $key)
<!-- Modal -->
    <div class="modal fade" id="editpencaker{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/perubahan/{{ $key->id }}" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <div class="mb-3">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" @error('nama') is-invalid @enderror name="nama" required
                            value="{{ $key->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{--  <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" @error('email') is-invalid @enderror name="email" required
                            value="{{ $key->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>  --}}
                    {{--  <div class="mb-3">
                                        <label for="password">Ganti Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kosongi Form Ini Apabila Tidak Ingin Mengubah Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>  --}}
                    <div class="mb-3">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" class="form-control" @error('tgl_lahir') is-invalid @enderror name="tgl_lahir" required
                            value="{{ $key->tgl_lahir }}">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control" @error('tempat_lhr') is-invalid @enderror
                            name="tempat_lhr" required value="{{ $key->tempat_lhr }}">
                        @error('tempat_lhr')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Jenis Kelamin</label>
                        <input type="text" class="form-control" @error('jenis_kelamin') is-invalid @enderror
                            name="jenis_kelamin" required value="{{ $key->jenis_kelamin }}">
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">No Handphone</label>
                        <input type="text" class="form-control" @error('telepon') is-invalid @enderror name="telepon" required
                            value="{{ $key->telepon }}">
                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">NIK</label>
                        <input type="text" class="form-control" @error('nik') is-invalid @enderror name="nik" required
                            value="{{ $key->nik }}">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Alamat</label>
                        <textarea type="text" class="form-control" @error('alamat') is-invalid @enderror name="alamat" required
                            value="{{ $key->alamat }}"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Agama</label>
                        <input type="text" class="form-control" @error('agama') is-invalid @enderror name="agama" required
                            value="{{ $key->agama }}">
                        @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Usia</label>
                        <input type="text" class="form-control" @error('usia') is-invalid @enderror name="usia" required
                            value="{{ $key->usia }}">
                        @error('usia')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Tinggi Badan</label>
                        <input type="text" class="form-control" @error('tb') is-invalid @enderror name="tb" required
                            value="{{ $key->tb }}">
                        @error('tb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Berat Badan</label>
                        <input type="text" class="form-control" @error('bb') is-invalid @enderror name="bb"required
                            value="{{ $key->bb }}">
                        @error('bb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Asal Sekolah</label>
                        <input type="text" class="form-control" @error('sekolah') is-invalid @enderror name="sekolah" required
                            value="{{ $key->sekolah }}">
                        @error('sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Jurusan</label>
                        <input type="text" class="form-control" @error('jurusan') is-invalid @enderror name="jurusan" required
                            value="{{ $key->jurusan }}">
                        @error('jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Tahun Lulus</label>
                        <input type="text" class="form-control" @error('thn_lulus') is-invalid @enderror
                            name="thn_lulus" required value="{{ $key->thn_lulus }}">
                        @error('thn_lulus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Pengalaman</label>
                        <input type="text" class="form-control" @error('pengalaman') is-invalid @enderror
                            name="pengalaman" required value="{{ $key->pengalaman }}">
                        @error('pengalaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Status Vaksin</label>
                        <input type="text" class="form-control" @error('vaksin') is-invalid @enderror name="vaksin" required
                            value="{{ $key->vaksin }}">
                        @error('vaksin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="/loker" class="btn btn-danger">Tidak</a>
                </form>
            </div>
            </div>
        </div>
    </div>
@endforeach

@foreach($pencaker as $key)
<!-- Modal -->
<div class="modal fade" id="delpencaker{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Lowongan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/brank/{id}">
            @method('DELETE')
            @csrf
            <a href="/brank/{{ $key->id }}" class="btn btn-danger">Ya</a>
            <a href="/pencaker" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
