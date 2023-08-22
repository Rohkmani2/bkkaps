@extends('home.main')
@section('konten')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{ asset("storage/".$informasi->foto) }}" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>Tanggal</h3>
                                <p>{{ $informasi->tgl_post }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>{{ $informasi->judul }}</h2>
                            </a>
                            <p>{!! $informasi->detail !!}</p>
                            <ul class="blog-info-link">
                                <li><a href="{{ Storage::url($informasi->file) }}" class="fa fa-download target="__blank" download="{{ $informasi->judul }}"> Unduh</a></i>
                            </ul>
                        </div>
                    </article>


                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
            </div>
        </div>
    </div>
</section>
@endsection
