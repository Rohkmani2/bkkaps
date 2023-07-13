@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h4 class="font-weight-bold mb-0">Selamat Datang {{ auth()->user()->nama }}</h4>
          </div>
          <div>
              <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                <i class="ti-clipboard btn-icon-prepend"></i>Report
              </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Pengguna</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_user }}</h3>
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Pencaker</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_user }}</h3>
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Perusahaan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_user }}</h3>
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Alumni</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_user }}</h3>
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Lowongan Kerja</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_loker }}</h3>
              <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Lamaran Kerja</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_lamaran }}</h3>
              <i class="ti-files menu-icon icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Informasi Terkini</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_informasi }}</h3>
              <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Ulasan</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $jml_ulasan }}</h3>
              <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
