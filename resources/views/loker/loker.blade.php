@extends('layouts.main')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">LOWONGAN KERJA</h4>
                <p class="card-description">
                    <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addloker">Tambah</a>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Posisi</th>
                                    <th>Usia</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Lokasi</th>
                                    <th>Detail</th>
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
                                @foreach ($loker as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td> <img src="{{ asset('storage/' . $item->foto) }}"
                                                style="width:100px; height:100px; object-fit:cover;" alt=""
                                                srcset=""</td>
                                        <td>{{ $item->perusahaan['nama'] }}</td>
                                        <td>{{ $item->posisi }}</td>
                                        <td>{{ $item->usia }}</td>
                                        <td>{{ $item->lokasi }}</td>
                                        <td>{{ $item->pendidikan }}</td>
                                        <td>{!! Str::limit($item->detail, 50 ) !!}</td>
                                        <td>
                                        @if ($item->status == '0')
                                            <a href="/upgrade-statusLoker/1/{{ $item->id }}" class="btn btn-success">Aktifkan</a>
                                        @else
                                            <a href="/upgrade-statusLoker/0/{{ $item->id }}" class="btn btn-danger">Non Aktifkan</a>
                                        @endif
                                        </td>
                                        <td>
                                            <botton class="btn btn-success"data-bs-toggle="modal"
                                                data-bs-target="#showloker{{ $item->id }}">Detail</botton>
                                            <botton class="btn btn-info"data-bs-toggle="modal"
                                                data-bs-target="#editloker{{ $item->id }}">Ubah</botton>
                                            <botton class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delloker{{ $item->id }}">Hapus</botton>
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
    <div class="modal fade" id="addloker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/simpan" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputUsername1">Perusahaan</label>
                            <select class="form-select @error('id_perusahaan') is-invalid @enderror"
                                aria-label="Default select example" name="id_perusahaan" id="id_perusahaan">
                                <option selected>Silahkan Pilih..</option>
                                @foreach($perusahaan as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_perusahaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdeskription">Posisi</label>
                            <input type="text" @error('posisi') is-invalid @enderror" name='posisi' class="form-control"
                                id="exampleInputUsername1" placeholder="Posisi" value="{{ old('posisi') }}">
                            @error('posisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Usia</label>
                            <input type="text" @error('usia') is-invalid @enderror" name='usia' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="usia" value="{{ old('usia') }}">
                            @error('usia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
                            <select class="form-select @error('pendidikan') is-invalid @enderror"
                                aria-label="Default select example" name="pendidikan" id="pendidikan">
                                <option selected>Silahkan Pilih..</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Lokasi</label>
                            <input type="text" @error('lokasi') is-invalid @enderror" name='lokasi' class="form-control"
                                id="exampleInputConfirmPassword1" placeholder="lokasi"
                                value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Detail</label>
                            <textarea type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control"
                                id="editor" placeholder="Detail Lowongan" value="{{ old('detail') }}"></textarea>
                            @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formFile">Foto</label>
                            <input type="file" name='foto' class="form-control" id="image"
                                placeholder="Password" value="{{ old('foto') }}">
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

    @foreach ($loker as $pin => $item)
        <!-- Modal -->
        <div class="modal fade" id="showloker{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Lowongan Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/upgrade/{{ $item->id }}" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Lengkap</label>
                                <input type="text" @error('nama') is-invalid @enderror" name='nama'
                                    class="form-control"  id="exampleInputUsername1" placeholder="Username"
                                    value="{{ $item->perusahaan->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Posisi</label>
                                <input type="posisi" @error('posisi') is-invalid @enderror" name='posisi'
                                    class="form-control"  id="exampleInputEmail1" placeholder="posisi"
                                    value="{{ $item->posisi }}">
                                @error('posisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Usia</label>
                                <input type="text" @error('usia') is-invalid @enderror" name='usia'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="usia"
                                    value="{{ $item->usia }}">
                                @error('usia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Jenjang Pendidikan</label>
                                <input type="text" @error('pendidikan') is-invalid @enderror" name='pendidikan'
                                    class="form-control"  id="exampleInputConfirmPassword1"
                                    placeholder="pendidikan" value="{{ $item->pendidikan }}">
                                @error('pendidikan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Lokasi</label>
                                <input type="text" @error('lokasi') is-invalid @enderror" name='lokasi'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="lokasi"
                                    value="{{ $item->lokasi }}">
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Detail</label>
                                <textarea type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control"
                                    id="editor1" placeholder="Password">{{ $item->detail }}</textarea>
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <br><label for="exampleInputConfirmPassword1">Foto</label><br>
                                <img src="{{ asset('storage/' . $item->foto) }}"
                                    style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($loker as $pin => $item)
        <!-- Modal -->
        <div class="modal fade" id="editloker{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mengubah Data Lowongan Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('/upgrade/' . $item->id) }}" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Perusahaan</label>
                                <input type="text" @error('nama') is-invalid @enderror" name='nama'
                                    class="form-control"  id="exampleInputUsername1"
                                    placeholder="Nama Perusahaan" value="{{ $item->perusahaan['nama'] }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputdeskription">Posisi</label>
                                <input type="text" @error('posisi') is-invalid @enderror" name='posisi'
                                    class="form-control"  id="exampleInputdeskription" placeholder="Posisi"
                                    value="{{ $item->posisi }}">
                                @error('posisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Usia</label>
                                <input type="text" @error('usia') is-invalid @enderror" name='usia'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="usia"
                                    value="{{ $item->usia }}">
                                @error('usia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
                                <select class="form-select @error('pendidikan') is-invalid @enderror"
                                    aria-label="Default select example" name="pendidikan" id="pendidikan">
                                    <option>{{ $item->pendidikan }}</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Lokasi</label>
                                <input type="text" @error('lokasi') is-invalid @enderror" name='lokasi'
                                    class="form-control"  id="exampleInputConfirmPassword1" placeholder="lokasi"
                                    value="{{ $item->lokasi }}">
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Detail</label>
                                <textarea type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control"
                                    id="editor1" placeholder="Detail">{{ $item->detail }}</textarea>
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="formFile">Foto</label>
                                <input type="file" name='foto' class="form-control" id="image"
                                    placeholder="foto" value="{{ $item->foto }}">
                                <img src="{{ asset('storage/' . $item->foto) }}"
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

    @foreach ($loker as $pin => $item)
        <!-- Modal -->
        <div class="modal fade" id="delloker{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Lowongan Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
                        <from method="POST" action="/apus/{id}">
                            @method('DELETE')
                            @csrf
                            <a href="/apus/{{ $item->id }}" class="btn btn-danger">Ya</a>
                            <a href="/loker" class="btn btn-primary">Tidak</a>
                        </from>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
