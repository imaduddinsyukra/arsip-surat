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
        <li class="breadcrumb-item active">Tambah Data User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Tambah Data User</div>
        <div class="card-body">
          <div class="table-responsive">
 

<form action="index.php?p=prosestambahuser" method="post" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <label>Nama User *</label>
        <input type="text" name="nama" class="form-control-rounded form-control" required="">
    </div>
    <div class="form-group">
        <label>Username *</label>
        <input type="text" name="username" class="form-control-rounded form-control" required="">
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
            <option value="Umum">Umum</option>
            <option value="Humas">Humas</option>
            <option value="Kesiswaan">Kesiswaan</option>
            <option value="Kurikulum">Kurikulum</option>
            <option value="Keuangan">Keuangan</option>
            <option value="Perpustakaan">Perpustakaan</option>
            <option value="Sarana Prasarana">Sarana Prasarana</option>
            <option value="Kepala Sekolah">Kepala Sekolah</option>
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