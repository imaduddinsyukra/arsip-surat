<?php
include '../config/koneksi.php';
$id = $_GET['id_surat_masuk']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_surat_masuk WHERE id_surat_masuk = '$id'"); //get the data that will be updated
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
          <a href="#">Surat Masuk</a>
        </li>
        <li class="breadcrumb-item active">Edit Data Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Edit Data Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
 

<form action="index.php?p=proseseditsuratmasuk" method="post" enctype="multipart/form-data">
<input type='hidden' name='id_surat_masuk' class="form-control" value="<?= $dt['id_surat_masuk'];?>">
    <div class="form-group mb-4">
        <label>No. Agenda *</label>
        <input type='text' name='no_agenda' class="form-control" value="<?= $dt['no_agenda'];?>" required>
    </div>
    <div class="form-group">
        <label>Indeks Berkas *</label>
        <input type='text' name='indek_berkas' class="form-control" value="<?= $dt['indek_berkas'];?>" required>
    </div>
    <div class="form-group mb-4">
        <label>Perihal *</label>
        <textarea name='perihal' class="form-control" required><?= $dt['perihal'];?></textarea>
    </div>

    <div class="form-group mb-4">
        <label>Pengirim *</label>
        <input type='text' name='pengirim' class="form-control" value="<?= $dt['pengirim'];?>" required>
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
        <label>Tanggal Diterima *</label>
        <input type='date' name='tgl_diterima' class="form-control" value="<?= $dt['tgl_diterima'];?>" required>
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