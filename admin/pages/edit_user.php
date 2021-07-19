<?php
include '../config/koneksi.php';
$id = $_GET['id']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_user WHERE id_user = '$id'"); //get the data that will be updated
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
          <a href="#">User</a>
        </li>
        <li class="breadcrumb-item active">Edit Data User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Form Edit Data User</div>
        <div class="card-body">
          <div class="table-responsive">
 

<form action="index.php?p=prosesedituser" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_user" class="form-control-rounded form-control" required="" value="<?php echo $dt['id_user']; ?>">

    <div class="form-group mb-4">
        <label>Nama User *</label>
        <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['nama']; ?>">
    </div>
    <div class="form-group">
        <label>Username *</label>
        <input type="text" name="username" class="form-control-rounded form-control" required="" value="<?php echo $dt['username']; ?>">
    </div>
    <div class="form-group mb-4">
        <label>Password *</label>
        <input type='password' name='password' id="pw1" class="form-control" minlength="8" required />
    </div>

    <div class="form-group mb-4">
        <label>Ulangi Password *</label>
        <input type='password' name='ulangipassword' id="pw2" class="form-control" minlength="8" required /> 
    </div>

    <div class="form-group">
        <label>Level *</label>
        <select class="form-control-rounded form-control" name="level" required="">
            <option value="Umum" <?php if($dt['level'] == 'Umum') { echo 'selected'; } ?>>Umum</option>
            <option value="Humas" <?php if($dt['level'] == 'Humas') { echo 'selected'; } ?>>Humas</option>
            <option value="Kesiswaan" <?php if($dt['level'] == 'Kesiswaan') { echo 'selected'; } ?>>Kesiswaan</option>
            <option value="Kurikulum" <?php if($dt['level'] == 'Kurikulum') { echo 'selected'; } ?>>Kurikulum</option>
            <option value="Keuangan" <?php if($dt['level'] == 'Keuangan') { echo 'selected'; } ?>>Keuangan</option>
            <option value="Perpustakaan" <?php if($dt['level'] == 'Perpustakaan') { echo 'selected'; } ?>>Perpustakaan</option>
            <option value="Sarana Prasarana" <?php if($dt['level'] == 'Sarana Prasarana') { echo 'selected'; } ?>>Sarana Prasarana</option>
            <option value="Kepala Sekolah" <?php if($dt['level'] == 'Kepala Sekolah') { echo 'selected'; } ?>>Kepala Sekolah</option>
        </select>
    </div>
    <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
</form>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->


<script type="text/javascript">
    window.onload = function () {
        document.getElementById("pw1").onchange = validatePassword;
        document.getElementById("pw2").onchange = validatePassword;
    }

    function validatePassword(){
    var pass2=document.getElementById("pw2").value;
    var pass1=document.getElementById("pw1").value;
    if(pass1!=pass2)
        document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
    else
        document.getElementById("pw2").setCustomValidity('');
    }
</script>