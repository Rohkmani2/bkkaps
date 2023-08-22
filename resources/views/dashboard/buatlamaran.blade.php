@extends('home.main')
@section('konten')
<div class="container-fluid p-0">
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <h2 class="h3 mb-3">Silahkan Isi Data Lamaran Kerja Anda</h2>
            <a href="/lokerdetail" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            <div class="card">
                <div class="card-body">
                    <form action="/save" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        <input type="hidden" name="id_loker">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Lengkap</label>
                                    <input type="text" @error('nama') is-invalid @enderror name='nama' class="form-control"
                                        id="exampleInputUsername1"  placeholder="Nama Lengkap" readonly value="{{ old('nama',auth()->user()->nama) }}">
                                    {{--  <input type="text" @error('nama') is-invalid @enderror name='nama' class="form-control"
                                        id="exampleInputUsername1"  placeholder="Nama Lengkap" value="{{ old('nama') }}">  --}}
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Email</label>
                                    <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                        id="exampleInputConfirmPassword1"  placeholder="Email" readonly value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">No Handphone</label>
                                    <input type="text" @error('telepon') is-invalid @enderror" name='telepon'
                                        class="form-control"  id="exampleInputConfirmPassword1" readonly placeholder="No Handphone"
                                        value="{{ $pencaker->telepon ?? old('telepon') }}">
                                    @error('telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">NIK</label>
                                    <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control"
                                        id="exampleInputConfirmPassword1"  placeholder="NIK" readonly value="{{ $pencaker->nik ?? old('nik') }}">
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" disabled
                                        aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                        <option selected>Silahkan Pilih..</option>
                                        <option @if($pencaker->jenis_kelamin === "Laki-laki") selected @endif value="laki-laki">Laki-laki</option>
                                        <option @if($pencaker->jenis_kelamin === "Perempuan") selected @endif value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                                    <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir"
                                        value="{{ $pencaker->tgl_lahir ?? old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tempat Lahir</label>
                                    <input type="text" @error('tempat_lhr') is-invalid @enderror" name='tempat_lhr' class="form-control"
                                        id="exampleInputConfirmPassword1"  placeholder="Tempat lahir" readonly
                                        value="{{ $pencaker->tempat_lhr ?? old('tempat_lhr') }}">
                                    @error('tempat_lhr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                                    <input type="text" @error('alamat') is-invalid @enderror" name='alamat' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Alamat Domisili"
                                        value="{{ $pencaker->alamat ?? old('alamat') }}">
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Agama</label>
                                    <input type="text" @error('agama') is-invalid @enderror" name='agama' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Agama"
                                        value="{{ $pencaker->agama ?? old('agama') }}">
                                    @error('agama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Usia</label>
                                    <input type="text" @error('usia') is-invalid @enderror" name='usia' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Usia"
                                        value="{{ $pencaker->usia ?? old('usia') }}">
                                    @error('usia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                                    <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control" readonly
                                        id="exampleInputConfirmPassword1"  placeholder="Tinggi Badan"
                                        value="{{ $pencaker->tb ?? old('tb') }}">
                                    @error('tb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Berat Badan</label>
                                    <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control" readonly
                                        id="exampleInputConfirmPassword1"  placeholder="Berat Badan" value="{{ $pencaker->bb ?? old('bb') }}">
                                    @error('bb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                                    <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Asal Sekolah"
                                        value="{{ $pencaker->sekolah ?? old('sekolah') }}">
                                    @error('sekolah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Jurusan</label>
                                    <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Jurusan"
                                        value="{{ $pencaker->jurusan ?? old('jurusan') }}">
                                    @error('jurusan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                                    <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Tahun Lulus"
                                        value="{{ $pencaker->thn_lulus ?? old('thn_lulus') }}">
                                    @error('thn_lulus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                                    <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman' readonly
                                        class="form-control"  id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja"
                                        value="{{ $pencaker->pengalaman ?? old('pengalaman') }}">
                                    @error('pengalaman')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="vaksin" class="form-label">Status Vaksin</label>
                                    <select class="form-select @error('vaksin') is-invalid @enderror" disabled
                                        aria-label="Default select example" name="vaksin" id="vaksin">
                                        <option selected>Silahkan Pilih..</option>
                                        <option @if($pencaker->vaksin === "vaksin 1") selected @endif value="vaksin 1">Vaksin 1</option>
                                        <option @if($pencaker->vaksin === "vaksin 2") selected @endif value="vaksin 2">Vaksin 2</option>
                                        <option @if($pencaker->vaksin === "booster 1") selected @endif value="booster 1">Booster 1</option>
                                        <option @if($pencaker->vaksin === "booster 2") selected @endif value="booster 2">Booster 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formFile">Upload Berkas Persyaratan</label>
                                    <input type="file" name='cv' class="form-control" id="file"
                                        placeholder="Upload Berkas Persyaratan" value="{{ $pencaker->cv ?? old('cv') }}">
                                    @error('cv')
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
                                <a href="/home" class="btn btn-danger">Tidak</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
