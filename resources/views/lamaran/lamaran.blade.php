@extends('layouts.main')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">LAMARAN KERJA</h4>
                <p class="card-description">
                    <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addlamaran">Tambah</a>
                </p>
                <thead class="thead-light">
                    <a href="/cetakLamaran" target="_blank" style="float: lift" class="btn btn-primary">Print</a>
                    <a href="{{ url('unduh-Laporan-Data-Lamaran-Kerja-pdf') }}" style="float: lift" target="_blank"><button
                            class="btn btn-danger">PDF</button>
                        <a href="{{ url('unduh-Laporan-Data-Lamaran-Kerja-xlsx') }}" style="float: lift"
                            target="_blank"><button class="btn btn-success">Excel</button>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No Handphone</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th>Alamat Domisili</th>
                                            <th>Agama</th>
                                            <th>Usia</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Asal Sekolah</th>
                                            <th>Jurusan</th>
                                            <th>Tahun Lulus</th>
                                            <th>Pengalaman Kerja</th>
                                            <th>Status Vaksin</th>
                                            <th>Upload CV</th>
                                            <th>Status</th>
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
                                        @foreach ($lamaran as $icon)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $icon->nama }}</td>
                                                <td>{{ $icon->email }}</td>
                                                <td>{{ $icon->telepon }}</td>
                                                <td>{{ $icon->nik }}</td>
                                                <td>{{ $icon->jenis_kelamin }}</td>
                                                <td>{{ $icon->tgl_lahir }}</td>
                                                <td>{{ $icon->ttl }}</td>
                                                <td>{{ $icon->alamat }}</td>
                                                <td>{{ $icon->agama }}</td>
                                                <td>{{ $icon->usia }}</td>
                                                <td>{{ $icon->tb }}</td>
                                                <td>{{ $icon->bb }}</td>
                                                <td>{{ $icon->sekolah }}</td>
                                                <td>{{ $icon->jurusan }}</td>
                                                <td>{{ $icon->thn_lulus }}</td>
                                                <td>{{ $icon->pengalaman }}</td>
                                                <td>{{ $icon->vaksin }}</td>
                                                {{--  <td>{{ $icon->cv }}</td>  --}}
                                                <td>
                                                    <a href="{{ Storage::url($icon->cv) }}" target="__blank"
                                                        download="{{ $icon->nama }}">Download</a>
                                                </td>
                                                <td>
                                                    <?php if($icon->status == '0') {?>
                                                    <a href="/upgrade-statusLamaran/1/{{ $icon->id }}" class="btn btn-success">Aktifkan</a>
                                                    <?php }else{?>
                                                    <a href="/upgrade-statusLamaran/0/{{ $icon->id }}" class="btn btn-danger">Non
                                                        Aktifkan</a>
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <botton class="btn btn-success"data-bs-toggle="modal"
                                                        data-bs-target="#showlamaran{{ $icon->id }}">Detail</botton>
                                                    <botton class="btn btn-info"data-bs-toggle="modal"
                                                        data-bs-target="#editlamaran{{ $icon->id }}">Ubah</botton>
                                                    <botton class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#dellamaran{{ $icon->id }}">Hapus</botton>
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
    <div class="modal fade" id="addlamaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lamaran Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/save" enctype="multipart/form-data">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Lengkap</label>
                            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control"
                                id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Email</label>
                            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">No Handphone</label>
                            <input type="text" @error('telepon') is-invalid @enderror" name='telepon'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="No Handphone"
                                value="{{ old('telepon') }}">
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">NIK</label>
                            <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="NIK" value="{{ old('nik') }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                <option selected>Silahkan Pilih..</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                            <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir"
                                value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tempat Lahir</label>
                            <input type="text" @error('ttl') is-invalid @enderror" name='ttl' class="form-control"
                                id="exampleInputConfirmPassword1"  placeholder="Tempat lahir"
                                value="{{ old('ttl') }}">
                            @error('ttl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                            <input type="text" @error('alamat') is-invalid @enderror" name='alamat'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Alamat Domisili"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Agama</label>
                            <input type="text" @error('agama') is-invalid @enderror" name='agama'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Agama"
                                value="{{ old('agama') }}">
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Usia</label>
                            <input type="text" @error('usia') is-invalid @enderror" name='usia'
                                class="form-control"  id="exampleInputConfirmPassword1" placeholder="Usia"
                                value="{{ old('usia') }}">
                            @error('usia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                            <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Tinggi Badan"
                                value="{{ old('tb') }}">
                            @error('tb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Berat Badan</label>
                            <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Berat Badan" value="{{ old('bb') }}">
                            @error('bb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                            <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Asal Sekolah"
                                value="{{ old('sekolah') }}">
                            @error('sekolah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Jurusan</label>
                            <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Jurusan"
                                value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                            <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Tahun Lulus"
                                value="{{ old('thn_lulus') }}">
                            @error('thn_lulus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                            <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja"
                                value="{{ old('pengalaman') }}">
                            @error('pengalaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="vaksin" class="form-label">Status Vaksin</label>
                            <select class="form-select @error('vaksin') is-invalid @enderror" 
                                aria-label="Default select example" name="vaksin" id="vaksin">
                                <option selected>Silahkan Pilih..</option>
                                <option value="vaksin 1">Vaksin 1</option>
                                <option value="vaksin 2">Vaksin 2</option>
                                <option value="booster 1">booster 1</option>
                                <option value="booster 2">booster 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formFile">Upload Berkas Persyaratan</label>
                            <input type="file" name='cv' class="form-control" id="file"
                                placeholder="Upload Berkas Persyaratan" value="{{ old('cv') }}">
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
                        <a href="/loker" class="btn btn-danger">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($lamaran as $key => $icon)
        <!-- Modal -->
        <div class="modal fade" id="showlamaran{{ $icon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Lamaran Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/save" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Lengkap</label>
                                <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control"
                                    id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ $icon->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Email</label>
                                <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Email" value="{{ $icon->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">No Handphone</label>
                                <input type="text" @error('telepon') is-invalid @enderror" name='telepon'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="No Handphone"
                                    value="{{ $icon->telepon }}">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">NIK</label>
                                <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="NIK" value="{{ $icon->nik }}">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">jenis Kelamin</label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                    aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                    <option >{{ $icon->jenis_kelamin }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                                <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir"
                                    value="{{ $icon->tgl_lahir }}">
                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tempat Lahir</label>
                                <input type="text" @error('ttl') is-invalid @enderror" name='ttl' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Tempat lahir"
                                    value="{{ $icon->ttl }}">
                                @error('ttl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                                <input type="text" @error('alamat') is-invalid @enderror" name='alamat'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Alamat Domisili"
                                    value="{{ $icon->alamat }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Agama</label>
                                <input type="text" @error('agama') is-invalid @enderror" name='agama'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Agama"
                                    value="{{ $icon->agama }}">
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Usia</label>
                                <input type="text" @error('usia') is-invalid @enderror" name='usia'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Usia"
                                    value="{{ $icon->usia }}">
                                @error('usia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                                <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Tinggi Badan"
                                    value="{{ $icon->tb }}">
                                @error('tb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Berat Badan</label>
                                <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Berat Badan" value="{{ $icon->bb }}">
                                @error('bb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                                <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Asal Sekolah"
                                    value="{{ $icon->sekolah }}">
                                @error('sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Jurusan</label>
                                <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Jurusan"
                                    value="{{ $icon->jurusan }}">
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                                <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Tahun Lulus"
                                    value="{{ $icon->thn_lulus }}">
                                @error('thn_lulus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                                <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja"
                                    value="{{ $icon->pengalaman }}">
                                @error('pengalaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="vaksin" class="form-label">Status Vaksin</label>
                                <select class="form-select @error('vaksin') is-invalid @enderror"
                                    aria-label="Default select example"  name="vaksin" id="vaksin">
                                    <option >{{ $icon->vaksin }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formFile">Upload Berkas Persyaratan</label>
                                <input type="text" name='cv' class="form-control" id="file"
                                    placeholder="Upload CV" value="{{ $icon->cv }}">
                                @error('cv')
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

    @foreach ($lamaran as $key => $icon)
        <!-- Modal -->
        <div class="modal fade" id="editlamaran{{ $icon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lamaran Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('/perbarui/' . $icon->id) }}" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Lengkap</label>
                                <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control"
                                    id="exampleInputUsername1"  placeholder="Nama Lengkap" value="{{ $icon->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Email</label>
                                <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Email" value="{{ $icon->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">No Handphone</label>
                                <input type="text" @error('telepon') is-invalid @enderror" name='telepon'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="No Handphone"
                                    value="{{ $icon->telepon }}">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">NIK</label>
                                <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="NIK" value="{{ $icon->nik }}">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">jenis Kelamin</label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                    aria-label="Default select example" name="jenis_kelamin" id="jenis_kelamin">
                                    <option >{{ $icon->jenis_kelamin }}</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                                <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir"
                                    value="{{ $icon->tgl_lahir }}">
                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tempat Lahir</label>
                                <input type="text" @error('ttl') is-invalid @enderror" name='ttl' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Tempat lahir"
                                    value="{{ $icon->ttl }}">
                                @error('ttl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                                <input type="text" @error('alamat') is-invalid @enderror" name='alamat'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Alamat Domisili"
                                    value="{{ $icon->alamat }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Agama</label>
                                <input type="text" @error('agama') is-invalid @enderror" name='agama'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Agama"
                                    value="{{ $icon->agama }}">
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Usia</label>
                                <input type="text" @error('usia') is-invalid @enderror" name='usia'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Usia"
                                    value="{{ $icon->usia }}">
                                @error('usia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                                <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Tinggi Badan"
                                    value="{{ $icon->tb }}">
                                @error('tb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Berat Badan</label>
                                <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control"
                                    id="exampleInputConfirmPassword1"  placeholder="Berat Badan" value="{{ $icon->bb }}">
                                @error('bb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                                <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Asal Sekolah"
                                    value="{{ $icon->sekolah }}">
                                @error('sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Jurusan</label>
                                <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Jurusan"
                                    value="{{ $icon->jurusan }}">
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                                <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Tahun Lulus"
                                    value="{{ $icon->thn_lulus }}">
                                @error('thn_lulus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                                <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja"
                                    value="{{ $icon->pengalaman }}">
                                @error('pengalaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="vaksin" class="form-label">Status Vaksin</label>
                                <select class="form-select @error('vaksin') is-invalid @enderror"
                                    aria-label="Default select example" name="vaksin" id="vaksin">
                                    <option >{{ $icon->vaksin }}</option>
                                    <option value="vaksin 1">Vaksin 1</option>
                                    <option value="vaksin 2">Vaksin 2</option>
                                    <option value="booster 1">booster 1</option>
                                    <option value="booster 2">booster 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formFile">Upload Berkas Persyaratan</label>
                                <input type="file" name='cv' class="form-control" id="file"
                                    placeholder="Upload CV" value="{{ $icon->cv }}">
                                <input type="text" name='cv' class="form-control" id="file"
                                    placeholder="Upload CV" value="{{ $icon->cv }}">
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
                            <a href="/loker" class="btn btn-danger">Tidak</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($lamaran as $key => $icon)
        <!-- Modal -->
        <div class="modal fade" id="dellamaran{{ $icon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Lamaran Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
                        <from method="POST" action="/hapus/{id}">
                            @method('DELETE')
                            @csrf
                            <a href="/hapus/{{ $icon->id }}" class="btn btn-danger">Ya</a>
                            <a href="/loker" class="btn btn-primary">Tidak</a>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
