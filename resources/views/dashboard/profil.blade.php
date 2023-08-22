@extends('home.main')
@section('konten')

    <div class="container-fluid p-0">
        <h1 class="h3">Profil</h1>
        <a href="/home" type="button" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
        <form action="{{ route('perubahan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                @isset ($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" id="preview" class="img-fluid rounded mb-5" width="100%" height="100%">
                                @else
                                    <img src="images/user.jpg" alt="Foto Profil" id="preview" class="img-fluid rounded mb-5" width="100%" height="100%">
                                    <p class="text-danger">Ini adalah foto Default, segera upload foto anda !</p>
                                @endisset

                                <input type="file" class="form-control" name="foto" onchange="previewImage()">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" required @error('nama') is-invalid @enderror name="nama" value="{{ old('nama',auth()->user()->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" required @error('email') is-invalid @enderror name="email" value="{{ old('email',auth()->user()->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" class="form-control" required @error('tgl_lahir') is-invalid @enderror name="tgl_lahir" value="{{ $user->tgl_lahir ?? old('tgl_lahir') }}">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Tempat Tanggal Lahir</label>
                                <input type="text" class="form-control" required @error('tempat_lhr') is-invalid @enderror name="tempat_lhr" value="{{ $user->tempat_lhr ?? old('tempat_lhr') }}">
                                @error('tempat_lhr')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Jenis Kelamin</label>
                                <input type="text" class="form-control" required @error('jenis_kelamin') is-invalid @enderror name="jenis_kelamin" value="{{ $user->jenis_kelamin ?? old('jenis_kelamin') }}">
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">No Handphone</label>
                                <input type="text" class="form-control" required @error('telepon') is-invalid @enderror name="telepon" value="{{ $user->telepon ?? old('telepon') }}">
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">NIK</label>
                                <input type="text" class="form-control" required @error('nik') is-invalid @enderror name="nik" value="{{ $user->nik ?? old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Alamat</label>
                                <textarea type="text" class="form-control" required @error('alamat') is-invalid @enderror name="alamat">{{ $user->alamat ?? old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Agama</label>
                                <input type="text" class="form-control" required @error('agama') is-invalid @enderror name="agama" value="{{ $user->agama ?? old('agama') }}">
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Usia</label>
                                <input type="text" class="form-control" required @error('usia') is-invalid @enderror name="usia" value="{{ $user->usia ?? old('usia') }}">
                                @error('usia')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Tinggi Badan</label>
                                <input type="text" class="form-control" required @error('tb') is-invalid @enderror name="tb" value="{{ $user->tb ?? old('tb') }}">
                                @error('tb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Berat Badan</label>
                                <input type="text" class="form-control" required @error('bb') is-invalid @enderror name="bb" value="{{ $user->bb ?? old('bb') }}">
                                @error('bb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Asal Sekolah</label>
                                <input type="text" class="form-control" required @error('sekolah') is-invalid @enderror name="sekolah" value="{{ $user->sekolah ?? old('sekolah') }}">
                                @error('sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Jurusan</label>
                                <input type="text" class="form-control" required @error('jurusan') is-invalid @enderror name="jurusan" value="{{ $user->jurusan ?? old('jurusan') }}">
                                @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Tahun Lulus</label>
                                <input type="text" class="form-control" required @error('thn_lulus') is-invalid @enderror name="thn_lulus" value="{{ $user->thn_lulus ?? old('thn_lulus') }}">
                                @error('thn_lulus')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Pengalaman</label>
                                <input type="text" class="form-control" required @error('pengalaman') is-invalid @enderror name="pengalaman" value="{{ $user->pengalaman ?? old('pengalaman') }}">
                                @error('pengalaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Status Vaksin</label>
                                <input type="text" class="form-control" required @error('vaksin') is-invalid @enderror name="vaksin" value="{{ $user->vaksin ?? old('vaksin') }}">
                                @error('vaksin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Ubah Password</label>

                                <input type="password" class="form-control"  @error('password') is-invalid @enderror name="password">

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Update Profil</button>
                </div>
            </div>
        </form>
    </div>

      <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

    <script>
        function previewImage(){
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
