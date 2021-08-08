<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin.php"><img src="assets/acc/gambar/bengkalis.png" width="10%"> &nbsp; Sistem Informasi Pengarsipan Surat</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Beranda</span>
          </a>
        </li>

        <?php if($_SESSION['level']=="Superadmin"){ ?>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Jenis Surat">
          <a class="nav-link" href="admin.php?part=data-jenis-surat">
            <i class="fa fa-fw fa-envelope-open"></i>
            <span class="nav-link-text">Jenis Surat</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link" href="admin.php?part=data-pengguna">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Pengguna</span>
          </a>
        </li>

        
        <?php } elseif($_SESSION['level']=="Umum"){ ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pengumuman">
          <a class="nav-link" href="admin.php?part=data-pengumuman">
            <i class="fa fa-fw fa-bullhorn"></i>
            <span class="nav-link-text">Pengumuman</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Info">
          <a class="nav-link" href="admin.php?part=data-info">
            <i class="fa fa-fw fa-info"></i>
            <span class="nav-link-text">Info</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Persuratan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Persuratan" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Persuratan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Persuratan">
            <li>
              <a href="admin.php?part=data-surat-masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="admin.php?part=data-surat-keluar">Surat Keluar</a>
            </li>
            <li>
              <a href="admin.php?part=data-disposisi">Disposisi</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rekomendasi">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Rekomendasi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Rekomendasi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Rekomendasi">
            <li>
              <a href="admin.php?part=data-surat-pengangkatan">Pengangkatan</a>
            </li>
            <li>
              <a href="admin.php?part=data-surat-pemberhentian">Pemberhentian</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Keluar">Surat Keluar</a>
            </li>
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Pengangkatan">Surat Rekomendasi Pengangkatan</a>
            </li>
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Pemberhentian">Surat Rekomendasi Pemberhentian</a>
            </li>
          </ul>
        </li>
        
        
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link" href="admin.php?part=data-user">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">User</span>
          </a>
        </li> -->

        <?php } elseif($_SESSION['level']=="Pimpinan"){ ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Disposisi">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Disposisi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Disposisi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Disposisi">
            <li>
              <a href="admin.php?part=data-disposisi&kategori=Surat Masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="admin.php?part=data-disposisi&kategori=Surat Keluar">Surat Keluar</a>
            </li>
            <li>
              <a href="admin.php?part=data-disposisi&kategori=Surat Pengangkatan">Rekomendasi Pengangkatan</a>
            </li>
            <li>
              <a href="admin.php?part=data-disposisi&kategori=Surat Pemberhentian">Rekomendasi Pemberhentian</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Persuratan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Persuratan" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Persuratan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Persuratan">
            <li>
              <a href="admin.php?part=data-surat-masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="admin.php?part=data-surat-keluar">Surat Keluar</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Rekomendasi">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Rekomendasi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Rekomendasi</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Rekomendasi">
            <li>
              <a href="admin.php?part=data-surat-pengangkatan">Pengangkatan</a>
            </li>
            <li>
              <a href="admin.php?part=data-surat-pemberhentian">Pemberhentian</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Info">
          <a class="nav-link" href="admin.php?part=data-info">
            <i class="fa fa-fw fa-info"></i>
            <span class="nav-link-text">Info</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Keluar">Surat Keluar</a>
            </li>
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Pengangkatan">Surat Rekomendasi Pengangkatan</a>
            </li>
            <li>
              <a href="admin.php?part=laporan&kategori=Surat Pemberhentian">Surat Rekomendasi Pemberhentian</a>
            </li>
          </ul>
        </li>

        <?php } else { ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
          <a class="nav-link" href="index.php?p=disposisi_surat">
            <i class="fa fa-fw fa-envelope-square"></i>
            <span class="nav-link-text">Disposisi</span>
          </a>
        </li>

        <?php } ?>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">        
        <li class="nav-item">
          <a class="nav-link">
            <i class="fa fa-fw fa-user"></i>Selamat Datang <u><b><?=$_SESSION['nama'];?></b></u> | </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>