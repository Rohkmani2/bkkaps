@extends('layouts.main')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">LAMARAN KERJA</h4>
        <p class="card-description">
          <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addlamaran">Tambah</a>
        </p>
        <thead class="thead-light">
            <a href="/cetakLamaran" target="_blank" style="float: lift" class="btn btn-primary">Print</a>
            <a href="{{ url('unduh-Laporan-Data-Lamaran-Kerja-pdf') }}" style="float: lift" target="_blank"><button class="btn btn-danger">PDF</button>
                <a href="{{ url('unduh-Laporan-Data-Lamaran-Kerja-xlsx') }}" style="float: lift" target="_blank"><button class="btn btn-success">Excel</button>
            </a>
        <div class="table-responsive">
          <table class="table table-striped">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>foto</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>NIK</th>
                <th>No Handphone</th>
                <th>Asal Kabupaten/kota</th>
                <th>Alamat Domisili</th>
                <th>Agama</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Tinggi Badan</th>
                <th>Berat Badan</th>
                <th>Asal Sekolah</th>
                <th>Tahun Lulus</th>
                <th>Jurusan</th>
                <th>password</th>
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
               $no=1;
           @endphp
           @foreach($alumni as $value )
           <tr>
             <td>{{ $no++ }}</td>
             <td>{{ $value->foto }}</td>
             <td>{{ $value->nama }}</td>
             <td>{{ $value->jenis_kelamin }}</td>
             <td>{{ $value->email }}</td>
             <td>{{ $value->nik }}</td>
             <td>{{ $value->telepon }}</td>
             <td>{{ $value->kota }}</td>
             <td>{{ $value->alamat }}</td>
             <td>{{ $value->agama }}</td>
             <td>{{ $value->tgl_lahir }}</td>
             <td>{{ $icon->usia }}</td>
             <td>{{ $icon->tb }}</td>
             <td>{{ $icon->bb }}</td>
             <td>{{ $icon->vaksin }}</td>
             <td>{{ $icon->sekolah }}</td>
             <td>{{ $icon->thn_lulus }}</td>
             <td>{{ $icon->pengalaman }}</td>
             <td>{{ $icon->jurusan }}</td>
             {{--  <td>{{ $icon->cv }}</td>  --}}
             <td>
                <a href="{{ Storage::url($icon->cv) }}" target="__blank" download="{{ $icon->nama }}">Download</a>
             </td>

             <td>
                 <botton class="btn btn-success"data-bs-toggle="modal" data-bs-target="#showlamaran{{ $icon->id }}">Detail</botton>
                 <botton class="btn btn-info"data-bs-toggle="modal" data-bs-target="#editlamaran{{ $icon->id }}">Ubah</botton>
                 <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#dellamaran{{ $icon->id }}">Hapus</botton>
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
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Lengkap</label>
            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control" id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ old('nama') }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputdeskription">Jenis Kelamin</label>
            <input type="text"  @error('jenis_kelamin') is-invalid @enderror" name='jenis_kelamin' class="form-control" id="exampleInputdeskription" placeholder="Jenis Kelamin" value="{{ old('jenis_kelamin') }}">
            @error('jenis_kelamin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Email</label>
            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control" id="exampleInputConfirmPassword1" placeholder="Email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">NIK</label>
                <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control" id="exampleInputConfirmPassword1" placeholder="NIK" value="{{ old('nik') }}">
                @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">No Handphone</label>
                    <input type="text" @error('telepon') is-invalid @enderror" name='telepon' class="form-control" id="exampleInputConfirmPassword1" placeholder="No Handphone" value="{{ old('telepon') }}">
                    @error('telepon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Asal Kota/Kabupaten</label>
                        <input type="text" @error('kota') is-invalid @enderror" name='kota' class="form-control" id="exampleInputConfirmPassword1" placeholder="Kota/Kabupaten>" value="{{ old('kota') }}">
                        @error('kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                            <input type="text" @error('alamat') is-invalid @enderror" name='alamat' class="form-control" id="exampleInputConfirmPassword1" placeholder="Alamat Domisili" value="{{ old('alamat') }}">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Agama</label>
                                <input type="text" @error('agama') is-invalid @enderror" name='agama' class="form-control" id="exampleInputConfirmPassword1" placeholder="Agama" value="{{ old('agama') }}">
                                @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                                    <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Usia</label>
                                        <input type="text" @error('usia') is-invalid @enderror" name='usia' class="form-control" id="exampleInputConfirmPassword1" placeholder="Usia" value="{{ old('usia') }}">
                                        @error('usia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                                            <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tinggi Badan" value="{{ old('tb') }}">
                                            @error('tb')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Berat Badan</label>
                                                <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control" id="exampleInputConfirmPassword1" placeholder="Berat Badan" value="{{ old('bb') }}">
                                                @error('bb')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Riwayat Vaksin</label>
                                                    <input type="text" @error('vaksin') is-invalid @enderror" name='vaksin' class="form-control" id="exampleInputConfirmPassword1" placeholder="Riwayat Vaksin" value="{{ old('vaksin') }}">
                                                    @error('vaksin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                                                            <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah' class="form-control" id="exampleInputConfirmPassword1" placeholder="Asal Sekolah" value="{{ old('sekolah') }}">
                                                            @error('sekolah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                                                                <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tahun Lulus" value="{{ old('thn_lulus') }}">
                                                                @error('thn_lulus')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                                                                        <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman' class="form-control" id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja" value="{{ old('pengalaman') }}">
                                                                        @error('pengalaman')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputConfirmPassword1">Jurusan</label>
                                                                            <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan' class="form-control" id="exampleInputConfirmPassword1" placeholder="Jurusan" value="{{ old('jurusan') }}">
                                                                            @error('jurusan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                            </div>
          <div class="form-group">
            <label for="formFile">Upload CV</label>
            <input type="file" name='cv' class="form-control" id="file" placeholder="Upload CV" value="{{ old('cv') }}">
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

@foreach($lamaran as $key => $icon)
<!-- Modal -->
<div class="modal fade" id="showlamaran{{ $icon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Lamaran Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/save" enctype="multipart/form-data">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Lengkap</label>
            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control" id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ $icon->nama }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputdeskription">Jenis Kelamin</label>
            <input type="text"  @error('jenis_kelamin') is-invalid @enderror" name='jenis_kelamin' class="form-control" id="exampleInputdeskription" placeholder="Jenis Kelamin" value="{{ $icon->jenis_kelamin }}">
            @error('jenis_kelamin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Email</label>
            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control" id="exampleInputConfirmPassword1" placeholder="Email" value="{{ $icon->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">NIK</label>
                <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control" id="exampleInputConfirmPassword1" placeholder="NIK" value="{{ $icon->nik }}">
                @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">No Handphone</label>
                    <input type="text" @error('telepon') is-invalid @enderror" name='telepon' class="form-control" id="exampleInputConfirmPassword1" placeholder="No Handphone" value="{{ $icon->telepon }}">
                    @error('telepon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Asal Kota/Kabupaten</label>
                        <input type="text" @error('kota') is-invalid @enderror" name='kota' class="form-control" id="exampleInputConfirmPassword1" placeholder="Kota/Kabupaten>" value="{{ $icon->kota }}">
                        @error('kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                            <input type="text" @error('alamat') is-invalid @enderror" name='alamat' class="form-control" id="exampleInputConfirmPassword1" placeholder="Alamat Domisili" value="{{ $icon->alamat }}">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Agama</label>
                                <input type="text" @error('agama') is-invalid @enderror" name='agama' class="form-control" id="exampleInputConfirmPassword1" placeholder="Agama" value="{{ $icon->agama }}">
                                @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                                    <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir" value="{{ $icon->tgl_lahir }}">
                                    @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Usia</label>
                                        <input type="text" @error('usia') is-invalid @enderror" name='usia' class="form-control" id="exampleInputConfirmPassword1" placeholder="Usia" value="{{ $icon->usia }}">
                                        @error('usia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                                            <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tinggi Badan" value="{{ $icon->tb }}">
                                            @error('tb')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Berat Badan</label>
                                                <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control" id="exampleInputConfirmPassword1" placeholder="Berat Badan" value="{{ $icon->bb }}">
                                                @error('bb')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Riwayat Vaksin</label>
                                                    <input type="text" @error('vaksin') is-invalid @enderror" name='vaksin' class="form-control" id="exampleInputConfirmPassword1" placeholder="Riwayat Vaksin" value="{{ $icon->vaksin }}">
                                                    @error('vaksin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                                                            <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah' class="form-control" id="exampleInputConfirmPassword1" placeholder="Asal Sekolah" value="{{ $icon->sekolah }}">
                                                            @error('sekolah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                                                                <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tahun Lulus" value="{{ $icon->thn_lulus }}">
                                                                @error('thn_lulus')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                                                                        <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman' class="form-control" id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja" value="{{ $icon->pengalaman }}">
                                                                        @error('pengalaman')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputConfirmPassword1">Jurusan</label>
                                                                            <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan' class="form-control" id="exampleInputConfirmPassword1" placeholder="Jurusan" value="{{ $icon->jurusan }}">
                                                                            @error('jurusan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                            </div>
          <div class="form-group">
            <label for="formFile">Upload CV</label>
            <input type="text" name='cv' class="form-control" id="file" placeholder="Upload CV" value="{{ $icon->cv }}">
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

@foreach($lamaran as $key => $icon)
<!-- Modal -->
<div class="modal fade" id="editlamaran{{ $icon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lamaran Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/perbarui/'.$icon->id) }}" enctype="multipart/form-data">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Lengkap</label>
            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control" id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ $icon->nama }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputdeskription">Jenis Kelamin</label>
            <input type="text"  @error('jenis_kelamin') is-invalid @enderror" name='jenis_kelamin' class="form-control" id="exampleInputdeskription" placeholder="Jenis Kelamin" value="{{ $icon->jenis_kelamin }}">
            @error('jenis_kelamin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Email</label>
            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control" id="exampleInputConfirmPassword1" placeholder="Email" value="{{ $icon->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1">NIK</label>
                <input type="text" @error('nik') is-invalid @enderror" name='nik' class="form-control" id="exampleInputConfirmPassword1" placeholder="NIK" value="{{ $icon->nik }}">
                @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">No Handphone</label>
                    <input type="text" @error('telepon') is-invalid @enderror" name='telepon' class="form-control" id="exampleInputConfirmPassword1" placeholder="No Handphone" value="{{ $icon->telepon }}">
                    @error('telepon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Asal Kota/Kabupaten</label>
                        <input type="text" @error('kota') is-invalid @enderror" name='kota' class="form-control" id="exampleInputConfirmPassword1" placeholder="Kota/Kabupaten>" value="{{ $icon->kota }}">
                        @error('kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                            <input type="text" @error('alamat') is-invalid @enderror" name='alamat' class="form-control" id="exampleInputConfirmPassword1" placeholder="Alamat Domisili" value="{{ $icon->alamat }}">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Agama</label>
                                <input type="text" @error('agama') is-invalid @enderror" name='agama' class="form-control" id="exampleInputConfirmPassword1" placeholder="Agama" value="{{ $icon->agama }}">
                                @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                                    <input type="date" @error('tgl_lahir') is-invalid @enderror" name='tgl_lahir' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir" value="{{ $icon->tgl_lahir }}">
                                    @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1">Usia</label>
                                        <input type="text" @error('usia') is-invalid @enderror" name='usia' class="form-control" id="exampleInputConfirmPassword1" placeholder="Usia" value="{{ $icon->usia }}">
                                        @error('usia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                                            <input type="text" @error('tb') is-invalid @enderror" name='tb' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tinggi Badan" value="{{ $icon->tb }}">
                                            @error('tb')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputConfirmPassword1">Berat Badan</label>
                                                <input type="text" @error('bb') is-invalid @enderror" name='bb' class="form-control" id="exampleInputConfirmPassword1" placeholder="Berat Badan" value="{{ $icon->bb }}">
                                                @error('bb')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputConfirmPassword1">Riwayat Vaksin</label>
                                                    <input type="text" @error('vaksin') is-invalid @enderror" name='vaksin' class="form-control" id="exampleInputConfirmPassword1" placeholder="Riwayat Vaksin" value="{{ $icon->vaksin }}">
                                                    @error('vaksin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                                                            <input type="text" @error('sekolah') is-invalid @enderror" name='sekolah' class="form-control" id="exampleInputConfirmPassword1" placeholder="Asal Sekolah" value="{{ $icon->sekolah }}">
                                                            @error('sekolah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                                                                <input type="text" @error('thn_lulus') is-invalid @enderror" name='thn_lulus' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tahun Lulus" value="{{ $icon->thn_lulus }}">
                                                                @error('thn_lulus')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputConfirmPassword1">Pengalaman Kerja</label>
                                                                        <input type="text" @error('pengalaman') is-invalid @enderror" name='pengalaman' class="form-control" id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja" value="{{ $icon->pengalaman }}">
                                                                        @error('pengalaman')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputConfirmPassword1">Jurusan</label>
                                                                            <input type="text" @error('jurusan') is-invalid @enderror" name='jurusan' class="form-control" id="exampleInputConfirmPassword1" placeholder="Jurusan" value="{{ $icon->jurusan }}">
                                                                            @error('jurusan')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                            </div>
          <div class="form-group">
            <label for="formFile">Upload CV</label>
            <input type="file" name='cv' class="form-control" id="file" placeholder="Upload CV" value="{{ $icon->cv }}">
            <input type="text" name='cv' class="form-control" id="file" placeholder="Upload CV" value="{{ $icon->cv }}">
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


@foreach($lamaran as $key => $icon)
<!-- Modal -->
<div class="modal fade" id="dellamaran{{ $icon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
