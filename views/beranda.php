<?php
  $tgl = date("d");
  $bulan = date("m");
  $tahun = date("Y");

  // Surat Masuk
  $query_sm = mysql_query("SELECT count(*) as jumlah from tbl_surat_masuk WHERE DAY(created_at) = '$tgl' and MONTH(created_at) = '$bulan' and YEAR(created_at) = '$tahun'"); 
  $sm=mysql_fetch_array($query_sm);
  $query_sm_tot = mysql_query("SELECT count(*) as total from tbl_surat_masuk"); 
  $sm_tot=mysql_fetch_array($query_sm_tot);

  // Surat Keluar
  $query_kl = mysql_query("SELECT count(*) as jumlah from tbl_surat_keluar WHERE DAY(created_at) = '$tgl' and MONTH(created_at) = '$bulan' and YEAR(created_at) = '$tahun'"); 
  $kl=mysql_fetch_array($query_kl);
  $query_kl_tot = mysql_query("SELECT count(*) as total from tbl_surat_keluar"); 
  $kl_tot=mysql_fetch_array($query_kl_tot);

  // Surat Pengangkatan
  $query_pk = mysql_query("SELECT count(*) as jumlah from tbl_surat_rekomendasi_pengangkatan WHERE DAY(created_at) = '$tgl' and MONTH(created_at) = '$bulan' and YEAR(created_at) = '$tahun'"); 
  $pk=mysql_fetch_array($query_pk);
  $query_pk_tot = mysql_query("SELECT count(*) as total from tbl_surat_rekomendasi_pengangkatan"); 
  $pk_tot=mysql_fetch_array($query_pk_tot);

  // Surat Pemberhentian
  $query_pbt = mysql_query("SELECT count(*) as jumlah from tbl_surat_rekomendasi_pemberhentian WHERE DAY(created_at) = '$tgl' and MONTH(created_at) = '$bulan' and YEAR(created_at) = '$tahun'"); 
  $pbt=mysql_fetch_array($query_pbt);
  $query_pbt_tot = mysql_query("SELECT count(*) as total from tbl_surat_rekomendasi_pemberhentian"); 
  $pbt_tot=mysql_fetch_array($query_pbt_tot);
?>


<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Beranda</a>
        </li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Halaman Beranda</div>
        <div class="card-body">
          <div class="table-responsive">
              <p align="justify">Selamat Datang <b><u><?= $_SESSION['nama'];?></u></b> Di Sistem Informasi Pengarsipan Surat yang merupakan wujud inovasi pada administrasi surat menyurat pada Kecamatan Tualang Mandau
              </p>
          </div>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Surat Masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2" style="border: 3px outset #007bff">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Surat <br/>Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sm['jumlah'];?>/<?= $sm_tot['total'];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Keluar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="border: 3px outset #28a745">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Surat <br/>Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kl['jumlah'];?>/<?= $kl_tot['total'];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Pengangkatan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="border: 3px outset #17a2b8">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Surat Pengangkatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pk['jumlah'];?>/<?= $pk_tot['total'];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Pemberhentian -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="border: 3px outset #ffc107">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Surat Pemberhentian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pbt['jumlah'];?>/<?= $pbt_tot['total'];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
      </div>

      <!-- PENGUMUMAN -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bullhorn"></i> Pengumuman</div>
        <div class="card-body">
          <div class="table-responsive">
            <?php
              $sqll = "select *, tbl_pengumuman.created_at as tgl_terbit from tbl_pengumuman join tbl_user where tbl_user.id_user = tbl_pengumuman.id_user order by tbl_pengumuman.created_at desc limit 5";
              $resultt = mysql_query($sqll);
              while($data = mysql_fetch_array($resultt)){
            ?> 
              <div>
                <b><?= $data['judul'];?></b>
              </div>
              <div>
                <small>Oleh: <b><?= $data['nama'];?></b> | Pada Tanggal: <b><?= $data['tgl_terbit'];?></b></small>
              </div>

              <div><?= $data['isi'];?></div>
              <div>
                <hr/>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

     
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->