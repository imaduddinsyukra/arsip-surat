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
              if($dt['status_disposisi']=="Menunggu Persetujuan"){
            ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-setuju">
                <i class="fa fa-fw fa-check"></i> Setujui
              </button>

              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tolak">
                <i class="fa fa-fw fa-times"></i> Tolak
              </button>
            <?php } elseif($dt['status_disposisi']=="Disetujui"){ ?>
              <a href="./admin.php?part=data-disposisi" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            <?php } elseif($dt['status_disposisi']=="Ditolak"){ ?>
              <a href="./admin.php?part=data-disposisi" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            <?php } ?>

            <br/><br/>
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
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['catatan_lanjutan']; ?>" readonly>
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
              if($dt['tujuan_disposisi']!="Pimpinan"){
            ?>
              <div class="card mb-3">
                <b>Dengan Hormat Harap</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['tindakan_lanjutan']; ?>" readonly>
              </div>
              <div class="card mb-3">
                <b>Batas Waktu</b>
                <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['batas_waktu_lanjutan']; ?>" readonly>
              </div>
            <?php } ?>

            <!-- <div class="card mb-3">
            <b>Catatan</b>
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?= $dt['catatan']; ?>" readonly>
            </div> -->

            <!-- <div class="card mb-3">
            Berkas Scan Surat<br>
              <a href="pages/download_berkas_masuk.php?id_surat_masuk=<?= $dt['id_surat_masuk']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Berkas</font></a>

              
            </div> -->
            <!-- Example Social Card-->
            
          </div>

          <?php
              if($kategori_surat!="Surat Pemberhentian"){
            ?>
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

  <!-- modal Setuju -->
  <div class="modal fade" id="modal-setuju">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="admin.php?part=aksi-disposisi" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Setujui Disposisi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type="hidden" name="parm" value="add_bos">
                <input type="hidden" name="kd" value="2">
                <input type="hidden" name="id_disposisi" value="<?= $id_disposisi;?>">
                <input type="hidden" name="kategori_surat" value="<?= $kategori_surat;?>">
                <input type='hidden' name='id_user_lanjutan' value="<?= $_SESSION['id_user']; ?>" required> 

                <div class="form-group">
                  <label for="exampleInputEmail1">Surat Dari</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Surat Dari" name="surat_dari_lanjutan" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Diterima Tanggal</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Surat Dari" name="diterima_tgl_lanjutan" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Sifat</label>
                  <select name="sifat_lanjutan" class="form-control" required>
                      <option value="0">Pilih Sifat</option>
                      <option value="Sangat Segera">Sangat Segera</option>  
                      <option value="Segera">Segera</option>
                      <option value="Rahasia">Rahasia</option>
                    </select>
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Perihal</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Perihal" name="hal_lanjutan" required>
                </div>

                <div class="form-group">
                    <label>Diteruskan Kepada (Orang Pertama)*</label>
                    <input type="text" name="diteruskan_lanjutan[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Diteruskan Kepada (Orang Kedua)</label>
                    <input type="text" name="diteruskan_lanjutan[]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Diteruskan Kepada (Orang Ketiga)</label>
                    <input type="text" name="diteruskan_lanjutan[]" class="form-control">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Dengan Hormat Harap</label>
                  <select name="tindakan_lanjutan" class="form-control" required>
                      <option value="0">Pilih Tindakan</option>
                      <option value="Tanggapan dan Saran">Tanggapan dan Saran</option>  
                      <option value="Proses Lebih Lanjut">Proses Lebih Lanjut</option>
                      <option value="Koordinasikan/Konfirmasikan">Koordinasikan/Konfirmasikan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Batas Waktu</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Batas Waktu" name="batas_waktu_lanjutan" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Catatan</label>
                  <textarea class="form-control" id="exampleInputEmail1" placeholder="Masukkan Catatan Jika Diperlukan" name="catatan_lanjutan" style="height: 100px"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label>File Surat Ditandatangani *</label><br>
                    <span><b><font color="red">Maksimal ukuran file 2 MB dengan Format Document (.doc atau .docx) </font></b> </span><br>
                    <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="200" required="" />
                </div>

              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- modal Tolak -->
  <div class="modal fade" id="modal-tolak">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="admin.php?part=aksi-disposisi" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Tolak Disposisi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type="hidden" name="parm" value="add_bos">
                <input type="hidden" name="kd" value="3">
                <input type="hidden" name="id_disposisi" value="<?= $id_disposisi;?>">
                <input type="hidden" name="kategori_surat" value="<?= $kategori_surat;?>">
                <input type='hidden' name='id_user_lanjutan' value="<?= $_SESSION['id_user']; ?>" required> 

                <div class="form-group">
                  <label for="exampleInputEmail1">Alasan Penolakan</label>
                  <textarea class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alasan Penolakan Surat Disposisi" name="catatan_lanjutan" style="height: 100px" required></textarea>
                </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" onClick="return confirm('Apakah Anda Yakin Ingin Menolak Disposisi Surat Ini?')">Simpan</button>
          </div>
        </form>
      
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->