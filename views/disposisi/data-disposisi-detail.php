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
elseif($kategori_surat=="Surat Pengangkatan"){
  $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_rekomendasi_pengangkatan join tbl_user where tbl_disposisi.no_surat = tbl_surat_rekomendasi_pengangkatan.no_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'");
}
elseif($kategori_surat=="Surat Pemberhentian"){
  $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_rekomendasi_pemberhentian join tbl_user where tbl_disposisi.no_surat = tbl_surat_rekomendasi_pemberhentian.no_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'");
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
            <div class="row">
              <div class="col-6">
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
              </div>
              <div class="col-6" align="right">
                <?php if($dt['status_disposisi'] == 'Disetujui'){ ?>
                  &nbsp;
                <?php } else { ?>
                  <a href="admin.php?part=ubah-disposisi&kategori_surat=<?= $kategori_surat;?>&kode=<?= $kode;?>&id_disposisi=<?= $id_disposisi; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Ubah Data</font></a>
                <?php } ?>
              </div>
            </div>



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

            <?php
              if($kategori_surat!="Surat Pengangkatan" && $kategori_surat!="Surat Pemberhentian"){
            ?>
              <div class="card mb-3">
                  <b>Jenis Surat</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['jenis_surat']; ?>" readonly>
              </div>
            <?php } ?>
            
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
            
          </div>
          <div class="row">
            <div class="col-12">
              <b>Status Disposisi</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['status_disposisi']; ?>" readonly>
            </div>
          </div>

          <?php if($dt['status_disposisi']=="Ditolak") { ?>
            <br/>
            <div class="row">
              <div class="col-12">
                <b>Alasan Ditolak</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['catatan_lanjutan']; ?>" readonly>
              </div>
            </div>
          <?php } ?>

          <?php 
            if($dt['status_disposisi']=="Disetujui"){
          ?>
          <hr style="border:5">
          <h5 align="center">Disposisi Lanjutan</h5>
          <br/>
          <div class="card-columns">
            <div class="card mb-6">
              <b>Dengan Hormat Harap</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tindakan_lanjutan']; ?>" readonly>
            </div>
            <div class="card mb-12">
              <b>Batas Waktu</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['batas_waktu_lanjutan']; ?>" readonly>
            </div>
            <div class="card mb-12">
                <b>Catatan</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['catatan']; ?>" readonly>
            </div>
            <div class="card mb-3">
                <b>File Disposisi Lanjutan</b><br/>
                <a href="<?= $dt['file_surat_lanjutan']; ?>" class="btn btn-success mb-3" target="_blank" style="width: 250px"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">File Disposisi Lanjutan</font></a>
            </div>
            <div class="card mb-3">
                <b>Surat Disposisi</b><br/>
                <a href="./views/cetak-surat/surat-disposisi.php?id_disposisi=<?= $dt['id_disposisi']; ?>" class="btn btn-success mb-3" target="_blank" style="width: 250px"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Surat Disposisi</font></a>
            </div>
          </div>
          <?php } ?>

          <?php
              if($kategori_surat!="Surat Pemberhentian"){
            ?>
            <br/><br/>
            <hr/>
            <h5 align="center">Lihat Surat</h5>
            <br/>
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

          <?php } ?>

          
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->