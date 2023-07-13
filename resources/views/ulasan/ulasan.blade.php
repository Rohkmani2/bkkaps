@extends('layouts.main')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ulasan</h4>
        <p class="card-description">
          <a href="/buat" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addpesan">Tambah</a>
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
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
           @foreach($ulasan as $dom )
           <tr>
             <td>{{ $no++ }}</td>
             <td>{{ $dom->nama }}</td>
             <td>{{ $dom->email }}</td>
             <td>{{ $dom->ulasan }}</td>
             <td>
                 <botton class="btn btn-success"data-bs-toggle="modal" data-bs-target="#showpesan{{ $dom->id }}">Detail</botton>
                 <botton class="btn btn-info"data-bs-toggle="modal" data-bs-target="#editpesan{{ $dom->id }}">Ubah</botton>
                 <botton class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delpesan{{ $dom->id }}">Hapus</botton>
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
<div class="modal fade" id="addpesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengisi Pesan yang ingin anda sampaikan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/create">
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
            <label for="exampleInputConfirmPassword1">Email</label>
            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan alamat Email anda" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Pesan</label>
            <input type="text" @error('ulasan') is-invalid @enderror" name='ulasan' class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan pesan yang ingin anda sampaikan" value="{{ old('ulasan') }}">
            @error('ulasan')
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
          <a href="/ulasan" class="btn btn-danger">Tidak</a>
        </form>
      </div>
    </div>
  </div>
</div>

@foreach($ulasan as $win => $dom)
<!-- Modal -->
<div class="modal fade" id="showpesan{{ $dom->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengubah Pesan yang ingin anda sampaikan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="/changed/{id}">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Lengkap</label>
            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control" id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ $dom->nama }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Email</label>
            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan alamat Email anda" value="{{ $dom->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Pesan</label>
            <input type="text" @error('ulasan') is-invalid @enderror" name='ulasan' class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan pesan yang ingin anda sampaikan" value="{{ $dom->ulasan }}">
            @error('ulasan')
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

@foreach($ulasan as $win => $dom)
<!-- Modal -->
<div class="modal fade" id="editpesan{{ $dom->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mengubah Pesan yang ingin anda sampaikan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('mengupdate', $dom->id) }}">
            @csrf
            @method('PUT')

            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Nama Lengkap</label>
            <input type="text" @error('nama') is-invalid @enderror" name='nama' class="form-control" id="exampleInputUsername1" placeholder="Nama Lengkap" value="{{ $dom->nama }}">
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Email</label>
            <input type="email" @error('email') is-invalid @enderror" name='email' class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan alamat Email anda" value="{{ $dom->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Pesan</label>
            <input type="text" @error('ulasan') is-invalid @enderror" name='ulasan' class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan pesan yang ingin anda sampaikan" value="{{ $dom->ulasan }}">
            @error('ulasan')
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
          <a href="/ulasan" class="btn btn-danger">Tidak</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($ulasan as $win => $dom)
<!-- Modal -->
<div class="modal fade" id="delpesan{{ $dom->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Pesan Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Apa Anda yakin untuk menghapus data ini?</h6>
        <from method="POST" action="/sampah/{id}">
            @method('DELETE')
            @csrf
            <a href="/sampah/{{ $dom->id }}" class="btn btn-danger">Ya</a>
            <a href="/ulasan" class="btn btn-primary">Tidak</a>
        </from>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
