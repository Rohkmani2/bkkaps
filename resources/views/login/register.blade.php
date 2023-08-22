<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REGISTER</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/bkkonewie.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <center>
                                    <img src="../../images/bkkonewie.png" alt="logo">
                                </center>
                            </div>
                            <h4>Buat Akun Anda</h4>
                            <h6 class="font-weight-light">Masukan data anda dengan jelas!</h6>
                            @if (session()->has('error'))
                                <p class="text danger">{{ session('error') }}</p>
                            @endif
                            <form method="post" action="{{ route('registrasi') }}" enctype="multipart/form-data">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" required id="exampleInputUsername1"
                                        placeholder="nama">
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" required id="exampleInputEmail1"
                                        placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kata Sandi</label>
                                    <input type="password" name="password" required class="form-control"
                                        id="exampleInputPassword1" placeholder="Kata Sandi">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Pilih Pengguna</label>
                                        <select class="form-control" name="level" required id="exampleFormControlSelect2">
                                          <option selected>Pilih Pengguna...</option>
                                          <option value="pencaker">Pencaker</option>
                                          <option value="perusahaan">Perusahaan</option>
                                        </select>
                                      </div>
                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Setuju
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Daftar</button>
                                <div class="text-center mt-4 font-weight-light">
                                    Apakah anda sudah memiliki akun? <a href="/login" class="text-primary">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
