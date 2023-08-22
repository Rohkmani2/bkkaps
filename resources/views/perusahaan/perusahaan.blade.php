@extends('layouts.main')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">PERUSAHAAN</h4>
        <p class="card-description">
          <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addindustri">Tambah</a>
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Perusahaan</th>
                <th>Nama_agen</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
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
           @foreach($perusahaan as $noun )
           <tr>
             <td>{{ $no++ }}</td>
             <td> <img src="{{ asset("storage/".$noun->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""</td>
             <td>{{ $noun->nama }}</td>
             <td>{{ $noun->agen }}</td>
             <td>{{ $noun->email }}</td>
             <td>{{ $noun->telepon }}</td>
             <td>{{ $noun->alamat }}</td>
             <td>
                 <botton class="btn btn-success"data-bs-toggle="modal" data-bs-target="#showindustri{{ $noun->id }}">Detail</botton>
                 <botton class="btn btn-info"data-bs-toggle="modal" data-bs-target="#editindustri{{ $noun->id }}">Ubah</botton>
                 <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delindustri{{ $noun->id }}">Hapus</botton>
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
<div class="modal fade" id="addindustri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/dadi" enctype="multipart/form-data">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Perusahaan</label>
            <input type="text" @error('nama') is-invalid @enderror name='nama' class="form-control" id="exampleInputUsername1" placeholder="Nama Perusahaan" value="{{ old('nama') }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputdeskription">Agen</label>
            <input type="text"  @error('agen') is-invalid @enderror name='agen' class="form-control" id="exampleInputUsername1" placeholder="agen" value="{{ old('agen') }}">
            @error('agen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">Email</label>
            <input type="text"  @error('email') is-invalid @enderror name='email' class="form-control"  id="exampleInputUsername1" placeholder="email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">telepon</label>
            <input type="text"  @error('telepon') is-invalid @enderror name='telepon' class="form-control" id="exampleInputUsername1" placeholder="telepon" value="{{ old('telepon') }}">
            @error('telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">alamat</label>
            <textarea type="text" @error('alamat') is-invalid @enderror name='alamat' class="form-control" id="exampleInputdeskription" placeholder="alamat" value="{{ old('alamat') }}"></textarea>
            @error('alamat')
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
          <div class="form-check form-check-flat form-check-primary">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              Setujui
            </label>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <a href="/perusahaan" class="btn btn-danger">Tidak</a>
        </form>
      </div>
    </div>
  </div>
</div>

@foreach($perusahaan as $noun )
<!-- Modal -->
<div class="modal fade" id="showindustri{{ $noun->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/ngatik{{ $noun->id }}" enctype="multipart/form-data">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Perusahaan</label>
            <input type="text" @error('nama') is-invalid @enderror name='nama' class="form-control" required id="exampleInputUsername1" placeholder="Nama Perusahaan" value="{{ $noun->nama }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputdeskription">Agen</label>
            <input type="text"  @error('agen') is-invalid @enderror name='agen' class="form-control" required id="exampleInputUsername1" placeholder="agen" value="{{ $noun->agen }}">
            @error('agen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">Email</label>
            <input type="text"  @error('email') is-invalid @enderror name='email' class="form-control" required id="exampleInputUsername1" placeholder="email" value="{{ $noun->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">telepon</label>
            <input type="text"  @error('telepon') is-invalid @enderror name='telepon' class="form-control" required id="exampleInputUsername1" placeholder="telepon" value="{{ $noun->telepon }}">
            @error('telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">alamat</label>
            <textarea type="text" @error('alamat') is-invalid @enderror name='alamat' class="form-control" required id="exampleInputdeskription" placeholder="alamat">{{ $noun->alamat }}</textarea>
            @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <br><label for="exampleInputConfirmPassword1">Foto</label><br>
            <img src="{{ asset("storage/".$noun->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset="">
         </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($perusahaan as $noun )
<!-- Modal -->
<div class="modal fade" id="editindustri{{ $noun->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengisi Data Lowongan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/ngatik/{{ $noun->id }}" enctype="multipart/form-data">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Perusahaan</label>
            <input type="text" @error('nama') is-invalid @enderror name='nama' class="form-control" required id="exampleInputUsername1" placeholder="Nama Perusahaan" value="{{ $noun->nama }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputdeskription">Agen</label>
            <input type="text"  @error('agen') is-invalid @enderror name='agen' class="form-control" required id="exampleInputUsername1" placeholder="agen" value="{{ $noun->agen }}">
            @error('agen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">Email</label>
            <input type="text"  @error('email') is-invalid @enderror name='email' class="form-control" required id="exampleInputUsername1" placeholder="email" value="{{ $noun->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">telepon</label>
            <input type="text"  @error('telepon') is-invalid @enderror name='telepon' class="form-control" required id="exampleInputUsername1" placeholder="telepon" value="{{ $noun->telepon }}">
            @error('telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputdeskription">alamat</label>
            <textarea type="text" @error('alamat') is-invalid @enderror name='alamat' class="form-control" required id="exampleInputdeskription" placeholder="alamat">{{ $noun->alamat }}</textarea>
            @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="formFile">Foto</label>
            <input type="file" name='foto' class="form-control" id="image" placeholder="foto" value="{{ $noun->foto }}">
            <img src="{{ asset("storage/".$noun->foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""</td>
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
          <a href="/perusahaan" class="btn btn-danger">Tidak</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($perusahaan as $noun)
<!-- Modal -->
<div class="modal fade" id="delindustri{{ $noun->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data Lowongan Kerja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/reset/{id}">
            @method('DELETE')
            @csrf
            <a href="/reset/{{ $noun->id }}" class="btn btn-danger">Ya</a>
            <a href="/perusahaan" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
