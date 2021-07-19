<?php
include '../config/koneksi.php';

// $username = $_SESSION['username']; 
// $que=mysql_query("select * from tbl_user where username='$username'");
// $data = mysql_fetch_array($que);

$id = $_GET['id_disposisi']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_user using(id_user) WHERE id_disposisi = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

$no_surat = $dt['no_surat'];

 ?>

<div id="lb-back" style="width: 1500px">
  <div id="lb-img" style="width: 1500px"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Disposisi Surat</a>
        </li>
        <li class="breadcrumb-item active">Detail Disposisi Surat</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Detail Disposisi Surat</div>
        <div class="card-body">
          <div class="table-responsive">

          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
          <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
          <div class="card-columns">

            <!-- Example Social Card-->
            <div class="card mb-3">
                <b>Disposisi Dari</b>
              <input type="text" name="no_surat" class="form-control-rounded form-control" required="" value="<?php echo $dt['level']; ?>" readonly>
            </div>

            <div class="card mb-3">
                <b>No. Surat</b>
              <input type="text" name="no_surat" class="form-control-rounded form-control" required="" value="<?php echo $dt['no_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                <b>Jenis Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['jenis_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                <b>Tujuan Disposisi</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tujuan_disposisi']; ?>" readonly>
            </div>

            <div class="card mb-3">
               <b> Isi Disposisi</b>
               <textarea class="form-control-rounded form-control" readonly=""><?php echo $dt['isi_disposisi']; ?></textarea>
            </div>

            <div class="card mb-3">
                <b> Sifat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['sifat']; ?>" readonly>
            </div>

            <div class="card mb-3">
               <b> Batas Waktu</b>
              <input type="date" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['batas_waktu']; ?>" readonly>
            </div>

            <div class="card mb-3">
                <b>Catatan</b>
              <textarea class="form-control-rounded form-control" readonly=""><?php echo $dt['catatan']; ?></textarea>
            </div>

            <div class="card mb-3">
            <b>Berkas Scan Surat</b><br>
            <?php if($dt['jenis_surat']=="Surat Masuk"){ ?>
            <?php 
              $surat = mysql_query("SELECT * FROM tbl_surat_masuk WHERE no_surat = '$no_surat'"); 
              $dt_surat=mysql_fetch_array($surat);
            ?>

              <a href="pages/download_berkas_masuk.php?id_surat_masuk=<?php echo $dt_surat['id_surat_masuk']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Berkas</font></a>
              <img src="<?php echo $dt_surat['gambar']; ?>" class="zoomD" alt="" style="width:500px">

            <?php } elseif($dt['jenis_surat']=="Surat Keluar"){ ?>
            <?php 
              $surat = mysql_query("SELECT * FROM tbl_surat_keluar WHERE no_surat = '$no_surat'"); 
              $dt_surat=mysql_fetch_array($surat);
            ?>
            
              <a href="pages/download_berkas_masuk.php?id_surat_masuk=<?php echo $dt_surat['id_surat_masuk']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Berkas</font></a>
              <img src="<?php echo $dt_surat['gambar']; ?>" class="zoomD" alt="" style="width:500px">

            <?php } ?>
            </div>

            
            <!-- Example Social Card-->
            
          </div>
          
          <!-- /Card Columns-->
 


            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->