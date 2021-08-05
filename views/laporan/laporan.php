<?php
error_reporting(0);
$kat = $_GET['kategori'];
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Laporan Surat <?= $kat;?></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Laporan Surat <?= $kat;?></div>
          <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="admin.php?part=tambah-jenis-surat" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a> -->
                <form action="" method="post">
                  <div class="row">
                    <div class="col-5">
                      <input type="date" name="tgl_mulai" class="form-control" value="<?= $_POST['tgl_mulai'];?>" required>
                    </div>
                    <div class="col-5">
                      <input type="date" name="tgl_selesai" class="form-control" value="<?= $_POST['tgl_selesai'];?>" required>
                    </div>
                    <div class="col-2" align="right">
                      <button type="submit" class="btn btn-md btn-success login-submit-cs"><i class="fa fa-fw fa-search"></i>Cari Data</button>
                    </div>
                  </div>
                </form>
                
                <br><br>
                <?php
                  $tgl_mulai = $_POST['tgl_mulai'];
                  $tanggal_selesai = $_POST['tgl_selesai'];
                  $ex = explode('-',$tanggal_selesai);
                  $new_sls = $ex[2]+1;
                  $tgl_selesai = $ex[0].'-'.$ex[1].'-'.$new_sls;

                  if($kat == "Surat Masuk"){
                    if($_POST['tgl_mulai']=="" && $_POST['tgl_selesai']==""){
                      $sqll = "select * from tbl_surat_masuk join tbl_user using(id_user)";
                    }
                    else{
                      $sqll = "select * from tbl_surat_masuk join tbl_user using(id_user) where tbl_surat_masuk.created_at between '$tgl_mulai' and '$tgl_selesai'";
                    }
                  }
                  elseif($kat == "Surat Keluar"){
                    if($_POST['tgl_mulai']=="" && $_POST['tgl_selesai']==""){
                      $sqll = "select * from tbl_surat_keluar join tbl_user using(id_user)";
                    }
                    else{
                      $sqll = "select * from tbl_surat_keluar join tbl_user using(id_user) where tbl_surat_keluar.created_at between '$tgl_mulai' and '$tgl_selesai'";
                    }
                  }
                  elseif($kat == "Surat Pengangkatan"){
                    if($_POST['tgl_mulai']=="" && $_POST['tgl_selesai']==""){
                      $sqll = "select * from tbl_surat_rekomendasi_pengangkatan join tbl_user using(id_user)";
                    }
                    else{
                      $sqll = "select * from tbl_surat_rekomendasi_pengangkatan join tbl_user using(id_user) where tbl_surat_rekomendasi_pengangkatan.created_at between '$tgl_mulai' and '$tgl_selesai'";
                    }
                  }
                  elseif($kat == "Surat Pemberhentian"){
                    if($_POST['tgl_mulai']=="" && $_POST['tgl_selesai']==""){
                      $sqll = "select * from tbl_surat_rekomendasi_pemberhentian join tbl_user using(id_user)";
                    }
                    else{
                      $sqll = "select * from tbl_surat_rekomendasi_pemberhentian join tbl_user using(id_user) where tbl_surat_rekomendasi_pemberhentian.created_at between '$tgl_mulai' and '$tgl_selesai'";
                    }
                  }
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 

                <a href="./views/laporan/cetak-laporan.php?tgl_mulai=<?= $_POST['tgl_mulai']; ?>&tgl_selesai=<?= $_POST['tgl_selesai'];?>&kategori=<?= $kat;?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Laporan</font></a>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><p align="center">No.</p></th>
                      <th><p align="center">No. Surat</p></th>
                      <th><p align="center">Tanggal Surat</p></th>
                      <?php if($kat == "Surat Masuk"){ ?>
                        <th><p align="center">Dari</p></th>
                        <th><p align="center">Tanggal Diterima</p></th>
                        <th><p align="center">Diterima Oleh</p></th>
                      <?php }elseif($kat == "Surat Keluar"){ ?>
                        <th><p align="center">Tujuan</p></th>
                        <th><p align="center">Tanggal Catat</p></th>
                        <th><p align="center">DiCatat Oleh</p></th>
                      <?php }elseif($kat == "Surat Pengangkatan" || $kat == "Surat Pemberhentian"){ ?>
                        <th><p align="center">Sifat</p></th>
                        <th><p align="center">Perihal</p></th>
                        <th><p align="center">Tujuan</p></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $nomor=1;
                    while($data = mysql_fetch_array($resultt)){
                  ?>              
                    <tr>
                      <td><?= $nomor++; ?></td>
                      <td><?= $data['no_surat'];?></td>
                      <td><?= $data['tgl_surat'];?></td>
                      <?php if($kat == "Surat Masuk"){ ?>
                        <td><?= $data['pengirim'];?></td>
                        <td><?= $data['tgl_diterima'];?></td>
                        <td><?= $data['nama'];?></td>
                      <?php }elseif($kat == "Surat Keluar"){ ?>
                        <td><?= $data['tujuan'];?></td>
                        <td><?= $data['tgl_catat'];?></td>
                        <td><?= $data['nama'];?></td>
                      <?php }elseif($kat == "Surat Pengangkatan" || $kat == "Surat Pemberhentian"){ ?>
                        <td><?= $data['sifat'];?></td>
                        <td><?= $data['perihal'];?></td>
                        <td><?= $data['tujuan_surat'];?></td>
                      <?php } ?>
                     
                    </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
                <?php
                  }else{
                    echo '<h3 align="center">Data Tidak Ditemukan!</h3>';
                    echo mysql_error();
                  }
                ?>           
                
                

                  
    <!-- modal Tambah -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form action="admin.php?part=aksi-jenis-surat" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Jenis Surat</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type="hidden" name="parm" value="add_bos">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Surat</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jenis Surat" name="jenis_surat">
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


  <!-- Modal Edit -->
  <?php
    $sqll = "select * from tbl_jenis_surat where keterangan='Aktif' order by jenis_surat";
    $resultt = mysql_query($sqll);
    while($data = mysql_fetch_array($resultt)){
  ?> 
  <div class="modal fade" id="modal-edit-<?= $data['id_jenis_surat'];?>">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form action="admin.php?part=aksi-jenis-surat" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Edit Surat Masuk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type='hidden' name='id_jenis_surat' class="form-control" value="<?= $data['id_jenis_surat'];?>">  
                <input type="hidden" name="parm" value="update_bos">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Surat</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jenis Surat" name="jenis_surat" value="<?= $data['jenis_surat'];?>">
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
  <?php
    }
  ?>
<!-- ==========================================================================   -->
              </div>
            </div>
        </div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->