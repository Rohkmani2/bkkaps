<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LOGIN</title>
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
              <h4>Selamat Datang di Bursa Kerja Khusus SMKN 1 Widasari</h4>
              <h6 class="font-weight-light">Silahkan anda masuk terlebih dahulu</h6>
              <form method="POST" action="/login">
              @csrf
                @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" required id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">
                  <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" required id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}">
                  <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-2">Masuk</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  {{--  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>  --}}
                  {{--  <a href="#" class="auth-link text-black">Forgot password?</a>  --}}
                </div>

                <div class="text-center mt-4 font-weight-light">
                  Apakah anda belum memiliki akun? <a href="/register" class="text-primary">Daftar</a>
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
