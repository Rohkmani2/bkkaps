<div class="col-lg-9 col-md-9">
    <div class="menu-wrapper">
        <!-- Main-menu -->
        <div class="main-menu">
            <nav class="d-none d-lg-block">
                <ul id="navigation">
                    <li><a href="/home">Home</a></li>
                    <li><a href="#profil">Tentang Kami</a>
                        <ul class="submenu">
                            <li><a href="#tentang">Profil BKK</a></li>
                            <li><a href="#kegiatan">Galeri Kegiatan</a></li>
                            <li><a href="#kontak">Hubungi Kami</a></li>
                        </ul>
                    <li><a href="#loker">Lowongan Kerja</a></li>
                    <li><a href="#informasi">Pengumuman</a></li>
                </ul>
            </nav>
        </div>
        <!-- Header-btn -->
        <div class="header-btn d-none f-right d-lg-block">
            @if($ket == 'logout')
            <a href="/register" class="btn head-btn1">Register</a>
            <a href="/login" class="btn head-btn2">Login</a>
            @endif
            @if($ket == 'login')
            <a href="/profil" class="btn head-btn1">profil</a>
            <a href="/logout" class="btn head-btn2">Keluar</a>
            @endif
        </div>
    </div>
</div>
