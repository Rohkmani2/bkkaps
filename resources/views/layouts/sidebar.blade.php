<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
        <?php if(auth()->user()->level == 'admin') { ?>
            <a class="nav-link" href="/dashboard">
        <?php }else{ ?>
            <a class="nav-link" href="/country.dashboard">
        <?php }?>

        <i class="ti-shield menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
        <?php if(auth()->user()->level == 'admin') { ?>
            <a class="nav-link" href="/loker">
        <?php }else{ ?>
            <a class="nav-link" href="/country.loker">
        <?php }?>
          <i class="ti-briefcase menu-icon"></i>
          <span class="menu-title">Lowongan Kerja</span>
        </a>
      </li>

      <li class="nav-item">
        <?php if(auth()->user()->level == 'admin') { ?>
            <a class="nav-link" href="/lamaran">
        <?php }else{ ?>
            <a class="nav-link" href="/country.lamaran">
        <?php }?>
          <i class="ti-files menu-icon"></i>
          <span class="menu-title">Lamaran Kerja</span>
        </a>
      </li>


      <?php if(auth()->user()->level == 'admin') { ?>
      <li class="nav-item">
        <a class="nav-link" href="/informasi">
          <i class="ti-agenda menu-icon"></i>
          <span class="menu-title">Informasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/kegiatan">
          <i class="ti-image menu-icon"></i>
          <span class="menu-title">Galeri Kegiatan</span>
        </a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <?php if(auth()->user()->level == 'admin') { ?>
            <a class="nav-link" href="/ulasan">
        <?php }else{ ?>
            <a class="nav-link" href="/country.ulasan">
        <?php }?>
          <i class="ti-layers menu-icon"></i>
          <span class="menu-title">Ulasan</span>
        </a>
      </li>


      <?php if(auth()->user()->level == 'admin') { ?>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">Pengguna</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/kelolaadmin">Kelola Admin</a></li>
            <li class="nav-item"> <a class="nav-link" href="/kelolapencaker">Kelola Pencaker</a></li>
            <li class="nav-item"> <a class="nav-link" href="/kelolaperusahaan">Kelola Perusahaan</a></li>
            <li class="nav-item"> <a class="nav-link" href="/kelolaalumni">Kelola Alumni</a></li>
          </ul>
        </div>
      </li>
      <?php } ?>


    <li class="nav-item">
        <a class="nav-link" href="/logout">
          <i class="ti-close menu-icon"></i>
          <span class="menu-title">Keluar</span
        </a>
      </li>
</nav>
