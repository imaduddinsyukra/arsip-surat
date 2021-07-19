<?php
  include("../config/koneksi.php");  
  ?>
  <?php
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
        <li class="breadcrumb-item active">Tambah Data Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Tambah Data Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
 

<form action="index.php?p=prosestambahsuratkeluar" method="post" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <label>No. Agenda *</label>
        <input type='text' name='no_agenda' class="form-control" required>
    </div>
    
    <div class="form-group mb-4">
        <label>Perihal *</label>
        <textarea name='perihal' class="form-control" required> </textarea>
    </div>

    <div class="form-group mb-4">
        <label>Tujuan *</label>
        <input type='text' name='tujuan' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>No. Surat *</label>
        <input type='text' name='no_surat' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Surat *</label>
        <input type='date' name='tgl_surat' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Pengarsipan *</label>
        <input type='date' name='tgl_catat' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Keterangan</label>
        <textarea name='keterangan' class="form-control"> </textarea>
    </div>

    <div class="form-group mb-4">
        <label>File Scan Surat *</label><br>
        <span><b><font color="red">Maksimal ukuran file 2 MB </font></b> </span><br>
        <!-- <input type='file' name='gambar' required> -->
        <input type="file" name='gambar' id="input-file-now-custom-2" class="dropify" data-height="500" required="" />
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