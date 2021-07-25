<?php
  $id = $_GET['id_surat_keluar']; //get the no which will updated
  $queryy = mysql_query("SELECT * FROM tbl_surat_keluar WHERE id_surat_keluar = '$id'"); //get the data that will be updated
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
          <a href="#">Surat Keluar</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Ubah Data Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
            <p align="right">
                <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </p>
            <?php 
              if(mysql_num_rows($queryy) > 0){
            ?>
              <form action="admin.php?part=aksi-surat-keluar" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id_surat_keluar' class="form-control" value="<?= $dt['id_surat_keluar'];?>">
                <input type="hidden" name="parm" value="update_bos">
                <div class="form-group mb-4">
                    <label>Tujuan *</label>
                    <input type='text' name='tujuan' class="form-control"  value="<?= $dt['tujuan'];?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>No. Surat *</label>
                    <input type='text' name='no_surat' class="form-control"  value="<?= $dt['no_surat'];?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>Tanggal Surat *</label>
                    <input type='date' name='tgl_surat' class="form-control"  value="<?= $dt['tgl_surat'];?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>Jenis Surat *</label>
                    <select class="form-control" name="id_jenis_surat" required>
                      <option value='0' disabled>Pilih Jurusan</option>";
                      <?php
                        $dt_jns = "select * from tbl_jenis_surat where keterangan='Aktif' order by jenis_surat";
                        $hasil = mysql_query($dt_jns);
                        while ($data_jenis=mysql_fetch_array($hasil)) {
                        ?>
                          <option value="<?= $data_jenis['id_jenis_surat'];?>" <?php if($dt['id_jenis_surat']==$data_jenis['id_jenis_surat']){echo "selected";} ?>><?= $data_jenis['jenis_surat'];?></option>
                      <?php
                        }
                      ?>      
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label>Tanggal Dicatat *</label>
                    <input type='date' name='tgl_catat' class="form-control"  value="<?= $dt['tgl_catat'];?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>Keterangan</label>
                    <textarea name='keterangan' class="form-control"><?= $dt['keterangan'];?></textarea>
                </div>

                <div class="form-group mb-4">
                    <label>File Scan Surat *</label><br>
                    <span><b><font color="red">Maksimal ukuran file 2 MB dengan Format Document (.doc atau .docx) </font></b> </span><br>
                    <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="200" data-default-file="<?= $dt['file_surat']; ?>"/>
                    <input name="gambar_lama" type="hidden" value="<?= $dt['file_surat']; ?>"/>
                </div>

                <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>   

                
                <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
              </form>
              <?php
                } else{
              ?>
              <h3 align="center">Data Tidak Ditemukan!</h3>

              <?php } ?>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->