@extends('layouts.main')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Informasi</h4>
        <p class="card-description">
          <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addinfo">Tambah</a>
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Detail</th>
                <th>File</th>
                <th>Tanggal Posting</th>
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
           @foreach($informasi as $key )
           <tr>
             <td>{{ $no++ }}</td>
             <td> <img src="{{ asset("storage/".$key->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""</td>
             <td>{{ $key->judul }}</td>
             <td>{{ $key->detail }}</td>
             {{--  <td>{{ $key->file }}</td>  --}}
             <td>
                <a href="{{ Storage::url($key->file) }}" target="__blank" download="{{ $key->judul }}">Download</a>
             </td>
             <td>{{ $key->tgl_post }}</td>
             <td>
                 <botton class="btn btn-success"data-bs-toggle="modal" data-bs-target="#showinfo{{ $key->id }}">Detail</botton>
                 <botton class="btn btn-info"data-bs-toggle="modal" data-bs-target="#editinfo{{ $key->id }}">Ubah</botton>
                 <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delinfo{{ $key->id }}">Hapus</botton>
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
<div class="modal fade" id="addinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengisi informasi pengumuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/post" enctype="multipart/form-data">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Judul Informasi</label>
            <input type="text" @error('judul') is-invalid @enderror" name='judul' class="form-control" id="exampleInputUsername1" placeholder="Judul Informasi" value="{{ old('judul') }}">
            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Detail</label>
            <input type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control" id="exampleInputConfirmPassword1" placeholder="Detail Informasi" value="{{ old('detail') }}">
            @error('detail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Tanggal Posting</label>
            <input type="date" @error('tgl_post') is-invalid @enderror" name='tgl_post' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Posting" value="{{ old('tgl_post') }}">
            @error('tgl_post')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
          <div class="form-group">
            <label for="formFile">Foto</label>
            <input type="file" name='foto' class="form-control" id="image" placeholder="Password" value="{{ old('foto') }}">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="formfile">File</label>
            <input type="file"  @error('file') is-invalid @enderror" name='file' class="form-control" id="exampleInputdeskription" placeholder="file" value="{{ old('file') }}">
            @error('file')
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

@foreach($informasi as $value => $key)
<!-- Modal -->
<div class="modal fade" id="showinfo{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail informasi pengumuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/baru/'.$key->id) }}" enctype="multipart/form-data">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Judul Informasi</label>
            <input type="text" @error('judul') is-invalid @enderror" name='judul' class="form-control" id="exampleInputUsername1" placeholder="Judul Informasi" value="{{ $key->judul }}">
            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Detail</label>
            <input type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control" id="exampleInputConfirmPassword1" placeholder="Detail Informasi" value="{{ $key->detail }}">
            @error('detail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Tanggal Posting</label>
            <input type="date" @error('tgl_post') is-invalid @enderror" name='tgl_post' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Posting" value="{{ $key->tgl_post }}">
            @error('tgl_post')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
          <div class="form-group">
                <br><label for="exampleInputConfirmPassword1">Foto</label><br>
                <img src="{{ asset("storage/".$key->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="formFile">File</label>
            <input type="text" name='file' class="form-control" id="file" placeholder="Upload CV" value="{{ $key->file }}">
            @error('file')
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

@foreach($informasi as $value => $key)
<!-- Modal -->
<div class="modal fade" id="editinfo{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengubah informasi pengumuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('rubah', $key->id ) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
          <div class="form-group">
            <label for="exampleInputUsername1">Judul Informasi</label>
            <input type="text" @error('judul') is-invalid @enderror" name='judul' class="form-control" id="exampleInputUsername1" placeholder="Judul Informasi" value="{{ $key->judul }}">
            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Detail</label>
            <input type="text" @error('detail') is-invalid @enderror" name='detail' class="form-control" id="exampleInputConfirmPassword1" placeholder="Detail Informasi" value="{{ $key->detail }}">
            @error('detail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Tanggal Posting</label>
            <input type="date" @error('tgl_post') is-invalid @enderror" name='tgl_post' class="form-control" id="exampleInputConfirmPassword1" placeholder="Tanggal Posting" value="{{ $key->tgl_post }}">
            @error('tgl_post')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
          <div class="form-group">
            <label for="formFile">Foto</label>
            <input type="file" name='foto' class="form-control" id="image" placeholder="Password" value="{{ $key->foto }}">
            <img src="{{ asset("storage/".$key->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
            @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="formfile">File</label>
            <input type="file"  @error('file') is-invalid @enderror" name='file' class="form-control" id="exampleInputdeskription" placeholder="file" value="{{ $key->file }}">
            <input type="text" name='file' class="form-control" id="file" placeholder="Upload CV" value="{{ $key->file }}">
            @error('file')
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

@foreach($informasi as $value => $key)
<!-- Modal -->
<div class="modal fade" id="delinfo{{ $key->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Lowongan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/buang/{id}">
            @method('DELETE')
            @csrf
            <a href="/buang/{{ $key->id }}" class="btn btn-danger">Ya</a>
            <a href="/loker" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
