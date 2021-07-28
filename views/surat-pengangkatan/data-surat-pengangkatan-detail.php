<?php
  $id = $_GET['id_surat_pengangkatan']; //get the no which will updated
  $queryy = mysql_query("SELECT * FROM tbl_surat_rekomendasi_pengangkatan join tbl_user using (id_user) WHERE id_surat_pengangkatan = '$id'"); //get the data that will be updated
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
          <a href="#">Surat Rekomendasi Pengangkatan</a>
        </li>
        <li class="breadcrumb-item active">Detail Surat Rekomendasi Pengangkatan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Detail Surat Rekomendasi Pengangkatan</div>
        <div class="card-body">
          <div class="table-responsive">

          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
          
          <div class="row">
            <div class="col-6">
              <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-6" align="right">
              <!-- Download File -->
              <a href="./views/cetak-surat/surat-pengangkatan.php?id_surat_pengangkatan=<?= $dt['id_surat_pengangkatan']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download File Surat Rekomendasi Pengangkatan</font></a>
            </div>
          </div>

          
          <div class="card-columns">

            <!-- Example Social Card-->
            <div class="card mb-3">
                <b>No. Surat </b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['no_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
            <b>Tanggal Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
            <b>Sifat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['sifat']; ?>" readonly>
            </div>

            <div class="card mb-3">
            <b>Perihal</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['perihal']; ?>" readonly>
            </div>
            
            <div class="card mb-3">
            <b>Tujuan Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tujuan_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
            <b>Diterima Oleh</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['nama']; ?>" readonly>
            </div>

            <div class="card mb-3">
            <b>File Surat Lampiran</b>
            <br/><br/>
              <p align="center">
                <a href="<?= $dt['file_surat']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download File Lampiran</font></a>
              </p>
            <br/>
            </div>
            
          </div>

            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->