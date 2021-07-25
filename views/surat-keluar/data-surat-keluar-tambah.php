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
            <p align="right">
                <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </p>

<form action="admin.php?part=aksi-surat-keluar" method="post" enctype="multipart/form-data">

<input type="hidden" name="parm" value="add_bos">
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
        <label>Jenis Surat *</label>
        <select class="form-control" name="id_jenis_surat" required>
            <option value="0" selected>Pilih Jenis Surat</option>
            <?php
              $sqll = "select * from tbl_jenis_surat where keterangan='Aktif' order by jenis_surat";
              $resultt = mysql_query($sqll);
              while($dt_jenis = mysql_fetch_array($resultt)){
            ?> 
              <option value="<?= $dt_jenis['id_jenis_surat'];?>"><?= $dt_jenis['jenis_surat'];?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Dicatat *</label>
        <input type='date' name='tgl_catat' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Keterangan</label>
        <textarea name='keterangan' class="form-control"></textarea>
    </div>

    <div class="form-group mb-4">
        <label>File Scan Surat *</label><br>
        <span><b><font color="red">Maksimal ukuran file 2 MB dengan Format Document (.doc atau .docx) </font></b> </span><br>
        <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="200" required="" />
    </div>

    <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>   

    
    <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
</form>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->