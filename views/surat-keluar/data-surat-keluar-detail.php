<?php
  $id = $_GET['id_surat_keluar']; //get the no which will updated
  $queryy = mysql_query("SELECT tbl_surat_keluar.*, tbl_user.nama, tbl_jenis_surat.jenis_surat as jenis_surat FROM tbl_surat_keluar join tbl_user using (id_user) join tbl_jenis_surat using (id_jenis_surat) WHERE id_surat_keluar = '$id'"); //get the data that will be updated
  $dt=mysql_fetch_array($queryy);

 ?>

<div id="lb-back">
  <div id="lb-img"></div>
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
              <b>No. Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['no_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
              <b>Tanggal Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
              <b>Tujuan</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tujuan']; ?>" readonly>
            </div>

            <div class="card mb-3">
              <b>Jenis Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['jenis_surat']; ?>" readonly>
            </div>
            
            <div class="card mb-3">
              <b>Tanggal Dicatat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_catat']; ?>" readonly>
            </div>

            <div class="card mb-3">
              <b>Diterima Oleh</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['nama']; ?>" readonly>
            </div>

            <div class="card mb-3">
              <b>Keterangan</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['keterangan']; ?>" readonly>
            </div>

          </div>

          <!-- Download File -->
          <p align="right">
            <a href="<?= $dt['file_surat']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download File Asli</font></a>
          </p>

          
          <!-- Preview File -->
          <div class="row">
            <div class="col-12" align="center">
              <?php 
                $ex = explode('./', $dt['file_surat']);
                $base_url = $_SERVER['HTTP_HOST'].'/'.$ex[1];
              ?>

              <iframe src="https://docs.google.com/gview?url=<?= $base_url; ?>&embedded=true" style="width: 100%; height: 500px"></iframe>
            </div>
          </div>

            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->