<?php
include '../config/koneksi.php';
$id = $_GET['id_surat_keluar']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_surat_keluar WHERE id_surat_keluar = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy)

 ?>

<div id="lb-back" style="width: 1500px">
  <div id="lb-img" style="width: 1500px"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Surat Keluar</a>
        </li>
        <li class="breadcrumb-item active">Detail Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Detail Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">

          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
          <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
          <div class="card-columns">

            <!-- Example Social Card-->
            <div class="card mb-3">
                No. Agenda
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['no_agenda']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Perihal
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['perihal']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Dari
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tujuan']; ?>" readonly>
            </div>

            <div class="card mb-3">
                No. Surat
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['no_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Tanggal Surat
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Tanggal Pencatatan
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_catat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Keterangan
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['keterangan']; ?>" readonly>
            </div>

            <div class="card mb-3">
            Berkas Scan Surat<br>
              <a href="pages/download_berkas_keluar.php?id_surat_keluar=<?php echo $dt['id_surat_keluar']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white"> Download Berkas</font></a>

              <img src="<?php echo $dt['gambar']; ?>" class="zoomD" alt="" style="width:500px">

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