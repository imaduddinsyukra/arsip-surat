<div id="lb-back">
  <div id="lb-img"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Info</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Info</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Tambah Data Info</div>
        <div class="card-body">
          <div class="table-responsive">
            <p align="right">
                <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </p>

<form action="admin.php?part=aksi-info" method="post" enctype="multipart/form-data">
    <input type="hidden" name="parm" value="add_bos">
    <input type="hidden" name="keterangan" value="">
    <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>

    <div class="form-group mb-4">
        <label>Judul Info*</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Info" name="judul_info" required>
    </div>

    <div class="form-group mb-4">
        <label>Jenis Info*</label>
        <select class="form-control" name="jenis_info" required>
          <option value="0" selected>Pilih Jenis Info</option>
          <option value="DIKLAT">DIKLAT</option>
          <option value="BLT">BLT</option>
          <option value="BUMIL">BUMIL</option>
          <option value="PKH">PKH</option>
        </select>
    </div>

    <div class="form-group mb-4">
        <label>Isi Info*</label>
        <textarea placeholder="Masukkan Jenis Info" class="ckeditor" id="ckedtor" name="isi_info" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
</form>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->