@extends('home.main')
@section('konten')
<main>
    <!-- slider Area Start-->
    <div id="home" class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="/images/galeri.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Bursa Kerja Khusus SMKN 1 WIDASARI</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Pilih Perusahaan">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select name="select" id="select1">
                                            <option value="">Pilih Posisi Pekerjaan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <a href="#">Cari</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Support Company Start-->
    <div id="tentang" class="support-company-area fix section-padding2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2">
                            <span>Tentang Kami</span>
                            <h2>BKK SMKN 1 WIDASARI</h2>
                        </div>
                        <div class="support-caption">
                            <p class="pera-top">Sebuah lembaga yang dibentuk di SMK Negeri 1 Widasari, sebagai unit pelaksana yang memberikan pelayanan dan informasi lowongan kerja, pelaksana pemasaran, penyaluran dan penempatan tenaga kerja, merupakan mitra Dinas Tenaga Kerja dan Transmigrasi.</p>
                            <p>Lihat dirimu dicermin, tunjukkan profesional, kompetitif dan berkualitas. Tidak ada jalan instan menuju kesuksesan selain buat mie instan.</p>
                            <a href="#loker" class="btn post-btn">Lihat Lowongan Kerja</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img">
                        <img src="images/bkkonewie.png" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
      {{--  <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Apply process</span>
                        <h2> How it works</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                           <h5>1. Search a job</h5>
                           <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                           <h5>2. Apply for job</h5>
                           <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                           <h5>3. Get your job</h5>
                           <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut laborea.</p>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-buildings" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $jml_loker }} </strong>Lowongan Tersedia</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-people-fill" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $jml_user }}</strong> Total User Terdaftar</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-info-square" style="font-size: 2rem;"></i> &nbsp; <strong>{{ $jml_informasi }} </strong> Total Informasi</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}

    <!-- Blog Area Start -->
    <div id="kegiatan" class="home-blog-area blog-h-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Kegiatan Kami</span>
                        <h2>Galeri Kegiatan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($kegiatan as $win)
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ asset("storage/".$win->foto) }}" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>Tanggal</span>
                                    <p>{{ $win->tgl_post }}</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>|   Pengumuman</p>
                                <h3><a href="single-blog.html">{{ $win->nama }}</a></h3>
                                <a href="/galeri-{{ $win->id }}" class="more-btn">Lihat Selengkapnya »</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
    <!-- Featured_job_end -->
    <!-- Online CV Area End-->
    <!-- Featured_job_start -->
    <section id="loker" class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Lowongan Tersedia</span>
                        <h2>Lowongan Kerja</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <!-- single-job-content -->
                    @foreach($loker as $pin)
                    @if($pin->status == '1')
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="job_details.html"><img src="{{ asset("storage/".$pin->foto) }}"style="width:100px; height:100px; object-fit:cover;" alt="" srcset=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="job_details.html"><h4>{{ $pin->perusahaan->nama }}</h4></a>
                                    <ul>
                                        <li>Posisi : {{ $pin->posisi }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $pin->lokasi }}</li>
                                    </ul>
                                    <div class="items-link f-left">
                                        <a href="/lokerdetail-{{ $pin->id }}?perusahaan={{ $pin->id }}">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('ajukan',['perusahaan'=>$pin->id]) }}" class="btn btn-sm btn-primary">Daftar</a>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Support Company End-->
    <!-- Blog Area Start -->
    <div id="informasi" class="home-blog-area blog-h-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Informasi Terkini</span>
                        <h2>Pengumuman</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($informasi as $value)
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{ asset("storage/".$value->foto) }}" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>Tanggal</span>
                                    <p>{{ $value->tgl_post }}</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>|   Pengumuman</p>
                                <h3><a href="single-blog.html">{{ $value->judul }}</a></h3>
                                <a href="/info-{{ $value->id }}" class="more-btn">Lihat Selengkapnya »</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
    <!-- Start contact Area -->
        <div id="kontak" class="contact-area">
            <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Hubungi Kami</span>
                            <h2>Kontak</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                    <div class="single-icon">
                        <i class="fa fa-mobile"></i>
                        <p>
                        Telepon: (0234)354348<br>
                        <span>Senin-Jumat (7am-4pm)</span>
                        </p>
                    </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                    <div class="single-icon">
                        <i class="fa fa-envelope"></i>
                        <p>
                        Email: smkn_1_widasari@yahoo.com<br>
                        <span>Web: www.smkn1widasari.mysch.id</span>
                        </p>
                    </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                    <div class="single-icon">
                        <i class="fa fa-map-marker"></i>
                        <p>
                        Location: Jalan By Pass Ujungjaya Desa Ujungjaya Kecamatan Widasari Kabupaten Indramayu Kode Pos 45271<br>
                        <span>Indramayu, Jawa Barat</span>
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4714.708167888541!2d108.28401822086428!3d-6.447779564162084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec707351172dd%3A0x90994ceef52bf809!2sSMK%20NEGERI%201%20WIDASARI!5e0!3m2!1sid!2sid!4v1689318920959!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!-- End Map -->
                </div>
                <!-- End Google Map -->

                <!-- Start  contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form contact-form">
                    <div id="sendmessage">Silahkan berikan ulasan anda disini!!!</div>
                    <div id="errormessage"></div>
                    <form action="/create" method="post" role="form" class="contactForm">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ old('nama') }}">
                        <div class="validation"></div>
                        </div>
                        <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email Anda" data-rule="email" data-msg="Please enter a valid email" value="{{ old('email') }}">
                        <div class="validation"></div>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No Handphone" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="{{ old('telepon') }}">
                        <div class="validation"></div>
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" name="ulasan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Ulasan yang ingin anda sampaikan" value="{{ old('ulasan') }}"></textarea>
                        <div class="validation"></div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                    </div>
                </div>
                <!-- End Left contact -->
                </div>
            </div>
            </div>
        </div>
        <!-- End Contact Area -->
</main>
@endsection
