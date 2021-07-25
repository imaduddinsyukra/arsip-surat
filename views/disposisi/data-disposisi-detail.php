<?php
$id_disposisi = $_GET['id_disposisi']; //get the no which will updated
$kode = $_GET['kode']; //get the no which will updated
$kategori_surat = $_GET['kategori_surat']; //get the no which will updated
if($kategori_surat=="Surat Masuk"){
  $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_masuk join tbl_jenis_surat join tbl_user where tbl_disposisi.no_surat = tbl_surat_masuk.no_surat and tbl_surat_masuk.id_jenis_surat = tbl_jenis_surat.id_jenis_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'"); 
}
elseif($kategori_surat=="Surat Keluar"){
  $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_keluar join tbl_jenis_surat join tbl_user where tbl_disposisi.no_surat = tbl_surat_keluar.no_surat and tbl_surat_keluar.id_jenis_surat = tbl_jenis_surat.id_jenis_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'");
}
$dt=mysql_fetch_array($queryy)

 ?>

<div id="lb-back">
  <div id="lb-img"></div>
</div>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Disposisi</a>
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
            <?php
              if($kode == '1'){
                if($kategori_surat=="Surat Masuk"){
                ?>
                  <a href="./admin.php?part=data-surat-masuk" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                  <?php
                } elseif($kategori_surat=="Surat Keluar"){
                ?>
                  <a href="./admin.php?part=data-surat-keluar" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
                <?php
                }
                ?>
            <?php
              } else if($kode == '2'){
            ?>
              <a href="./admin.php?part=data-disposisi" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            <?php } ?>
          <div class="card-columns">

            <!-- Example Social Card-->
            <div class="card mb-3">
                <b>Disposisi Dari</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['nama']; ?>" readonly>
            </div>

            <?php
              if($kategori_surat=="Surat Masuk"){
            ?>
              <div class="card mb-3">
                  <b>Surat Dari</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['pengirim']; ?>" readonly>
              </div>
            <?php 
              } elseif($kategori_surat=="Surat Keluar"){ 
            ?>
                <div class="card mb-3">
                    <b>Tujuan Surat</b>
                  <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tujuan']; ?>" readonly>
                </div>
            <?php } ?>

            <div class="card mb-3">
                <b>No. Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['no_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                <b>Jenis Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['jenis_surat']; ?>" readonly>
            </div>
            
            <div class="card mb-3">
                <b>Tanggal Surat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tgl_surat']; ?>" readonly>
            </div>
           
            <?php
              if($kategori_surat=="Surat Masuk"){
            ?>
              <div class="card mb-3">
                  <b>Tanggal Diterima</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tgl_diterima']; ?>" readonly>
              </div>
              <?php
              } elseif($kategori_surat == "Surat Keluar"){ 
                ?>
              <div class="card mb-3">
                  <b>Tanggal Dicatat</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tgl_catat']; ?>" readonly>
              </div>
            <?php } ?>
            <div class="card mb-3">
                <b>No. Agenda</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['no_agenda']; ?>" readonly>
            </div>
           
            <div class="card mb-3">
                <b>Sifat</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['sifat']; ?>" readonly>
            </div>
           
            <div class="card mb-3">
                <b>Hal</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['isi_disposisi']; ?>" readonly>
            </div>
           
            <div class="card mb-3">
                <b>Diteruskan Kepada</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tujuan_disposisi']; ?>" readonly>
            </div>

            <?php 
              if($dt['tujuan_disposisi']!="Pimpinan"){
            ?>
              <div class="card mb-3">
                <b>Dengan Hormat Harap</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tindakan']; ?>" readonly>
              </div>
              <div class="card mb-3">
                <b>Batas Waktu</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['batas_waktu']; ?>" readonly>
              </div>
            <?php } ?>

            <div class="card mb-3">
                Catatan
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['catatan']; ?>" readonly>
            </div>

            <!-- <div class="card mb-3">
            Berkas Scan Surat<br>
              <a href="pages/download_berkas_masuk.php?id_surat_masuk=<?= $dt['id_surat_masuk']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Berkas</font></a>

              
            </div> -->
            <!-- Example Social Card-->
            
          </div>

          <p align="right">
            <a href="<?= $dt['file_surat']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Surat</font></a>
          </p>

          <iframe class="doc" src="https://docs.google.com/gview?url=<?= $dt['file_surat'];?>&embedded=true" style="width: 100%; height: 500px"></iframe>
          
          <!-- /Card Columns-->
 

          <div class="row">
            <div class="col-12" align="center">
            <iframe class="doc" src="https://docs.google.com/gview?url=<?=$dt['file_surat'];?>&embedded=true" style="width: 100%; height: 500px"></iframe>
            <iframe class="doc" src="https://docs.google.com/gview?url=https://file-examples-com.github.io/uploads/2017/02/file-sample_100kB.doc&embedded=true" style="width: 100%; height: 500px"></iframe>

            </div>
          </div>

            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->