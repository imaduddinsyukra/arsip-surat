<?php
include '../config/koneksi.php';
$id = $_GET['id_surat_keluar']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_surat_keluar WHERE id_surat_keluar = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

 
$username = $_SESSION['username']; 
$que=mysql_query("select * from tbl_user where username='$username'");
$data = mysql_fetch_array($que);
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
        <li class="breadcrumb-item active">Edit Data Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Edit Data Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
 

<form action="index.php?p=proseseditsuratkeluar" method="post" enctype="multipart/form-data">
<input type='hidden' name='id_surat_keluar' class="form-control" value="<?= $dt['id_surat_keluar'];?>">
    <div class="form-group mb-4">
        <label>No. Agenda *</label>
        <input type='text' name='no_agenda' class="form-control" value="<?= $dt['no_agenda'];?>" required>
    </div>
    
    <div class="form-group mb-4">
        <label>Perihal *</label>
        <textarea name='perihal' class="form-control" required><?= $dt['perihal'];?></textarea>
    </div>

    <div class="form-group mb-4">
        <label>Tujuan *</label>
        <input type='text' name='tujuan' class="form-control" value="<?= $dt['tujuan'];?>" required>
    </div>

    <div class="form-group mb-4">
        <label>No. Surat *</label>
        <input type='text' name='no_surat' class="form-control" value="<?= $dt['no_surat'];?>" required>
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Surat *</label>
        <input type='date' name='tgl_surat' class="form-control" value="<?= $dt['tgl_surat'];?>" required>
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Arsip *</label>
        <input type='date' name='tgl_catat' class="form-control" value="<?= $dt['tgl_catat'];?>" required>
    </div>

    <div class="form-group mb-4">
        <label>Keterangan</label>
        <textarea name='keterangan' class="form-control"><?= $dt['keterangan'];?> </textarea>
    </div>

    <div class="form-group mb-4">
        <label>File Scan Surat *</label><br>
        <span><b><font color="red">Maksimal ukuran file 2 MB </font></b> </span><br>

        <input name="gambar" type="file" id="input-file-now-custom-2" class="dropify" data-default-file="<?= $dt['gambar']; ?>" data-height="500"/>
        <input name="gambar_lama" type="hidden" value="<?= $dt['gambar']; ?>"/>
    </div>

    <input type='hidden' name='id_user' value="<?php echo $data['id_user']; ?>" required>   

    
    <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
</form>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->