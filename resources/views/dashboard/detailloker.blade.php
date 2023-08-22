@extends('home.main')
@section('konten')
{{--  @foreach($loker as $pin)  --}}
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{ asset("storage/".$loker->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $loker->perusahaan->nama }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $loker->posisi }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $loker->lokasi }}</li>
                                    <li>{{ $loker->usia }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        {!! $loker->detail !!}
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        {{--  <h4>Job Overview</h4>  --}}
                    </div>
                    <img src="{{ asset("storage/".$loker->foto) }}" style="width:300px; height:450px;" alt="" srcset="">
                    <div class="apply-btn2">
                        <a href="/ajukan?perusahaan={{ request('perusahaan') }}" class="btn">Daftar</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
{{--  @endforeach  --}}

  <!-- Modal -->
    <div class="modal fade" id="addlamaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lamaran Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('save',['perusahaan'=>request('perusahaan')]) }}" enctype="multipart/form-data">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Lengkap</label>
                            <input type="text" @error('nama') is-invalid @enderror name='nama' class="form-control"
                                id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdeskription">Jenis Kelamin</label>
                            <input type="text" @error('jenis_kelamin') is-invalid @enderror name='jenis_kelamin'
                                class="form-control" id="exampleInputdeskription" placeholder="Jenis Kelamin"
                                value="{{ old('jenis_kelamin') }}">
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Email</label>
                            <input type="email" @error('email') is-invalid @enderror name='email' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">NIK</label>
                            <input type="text" @error('nik') is-invalid @enderror name='nik' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="NIK" value="{{ old('nik') }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">No Handphone</label>
                            <input type="text" @error('telepon') is-invalid @enderror name='telepon'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="No Handphone"
                                value="{{ old('telepon') }}">
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Asal Kota/Kabupaten</label>
                            <input type="text" @error('kota') is-invalid @enderror name='kota'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Kota/Kabupaten>"
                                value="{{ old('kota') }}">
                            @error('kota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Alamat Domisili</label>
                            <textarea type="text" @error('alamat') is-invalid @enderror name='alamat' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Alamat Domisili" value="{{ old('alamat') }}"></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Agama</label>
                            <input type="text" @error('agama') is-invalid @enderror name='agama'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Agama"
                                value="{{ old('agama') }}">
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tanggal Lahir</label>
                            <input type="date" @error('tgl_lahir') is-invalid @enderror name='tgl_lahir'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Lahir"
                                value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Usia</label>
                            <input type="text" @error('usia') is-invalid @enderror name='usia'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Usia"
                                value="{{ old('usia') }}">
                            @error('usia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tinggi Badan</label>
                            <input type="text" @error('tb') is-invalid @enderror name='tb' class="form-control"
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
                            <input type="text" @error('bb') is-invalid @enderror name='bb' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Berat Badan" value="{{ old('bb') }}">
                            @error('bb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Riwayat Vaksin</label>
                            <input type="text" @error('vaksin') is-invalid @enderror name='vaksin'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Riwayat Vaksin"
                                value="{{ old('vaksin') }}">
                            @error('vaksin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Asal Sekolah</label>
                            <input type="text" @error('sekolah') is-invalid @enderror name='sekolah'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Asal Sekolah"
                                value="{{ old('sekolah') }}">
                            @error('sekolah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Tahun Lulus</label>
                            <input type="text" @error('thn_lulus') is-invalid @enderror name='thn_lulus'
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
                            <textarea type="text" @error('pengalaman') is-invalid @enderror name='pengalaman' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="Pengalaman Kerja" value="{{ old('pengalaman') }}"></textarea>
                            @error('pengalaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Jurusan</label>
                            <input type="text" @error('jurusan') is-invalid @enderror name='jurusan'
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Jurusan"
                                value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formFile">Berkas Persyaratan Kerja</label>
                            <input type="file" name='cv' class="form-control" id="file"
                                placeholder="Upload Berkas Persyaratan Kerja" value="{{ old('cv') }}">
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
@endsection
