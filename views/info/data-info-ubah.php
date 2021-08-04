<?php
  $id = $_GET['id_info']; //get the no which will updated
  $queryy = mysql_query("SELECT * FROM tbl_info WHERE id_info = '$id'"); //get the data that will be updated
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
          <a href="#">Info</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Info</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Ubah Data Info</div>
        <div class="card-body">
          <div class="table-responsive">
            <p align="right">
                <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </p>
            <?php 
              if(mysql_num_rows($queryy) > 0){
            ?>
              <form action="admin.php?part=aksi-info" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id_info' class="form-control" value="<?= $dt['id_info'];?>">
                <input type="hidden" name="parm" value="update_bos">
                <input type="hidden" name="keterangan"  value="<?= $dt['keterangan'];?>">
                <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>

                <div class="form-group mb-4">
                    <label>Judul Info*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Info" name="judul_info" value="<?= $dt['judul_info'];?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>Jenis Info*</label>
                    <select class="form-control" name="jenis_info" required>
                      <option value='0' disabled>Pilih Jenis Info</option>
                      <option value="DIKLAT" <?php if($dt['jenis_info']=="DIKLAT"){echo "selected";} ?>>DIKLAT</option>
                      <option value="BLT" <?php if($dt['jenis_info']=="BLT"){echo "selected";} ?>>BLT</option>
                      <option value="BUMIL" <?php if($dt['jenis_info']=="BUMIL"){echo "selected";} ?>>BUMIL</option>
                      <option value="PKH" <?php if($dt['jenis_info']=="PKH"){echo "selected";} ?>>PKH</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label>Isi Info*</label>
                    <textarea placeholder="Masukkan Jenis Info" class="ckeditor" id="ckedtor" name="isi_info" required><?= $dt['isi_info'];?></textarea>
                </div>

                <div class="form-group mb-4">
                    <label>File Info *</label><br>
                    <span><b><font color="red">Maksimal ukuran file 2 MB dengan Format Document (.doc atau .docx) </font></b> </span><br>
                    <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="200" data-default-file="<?= $dt['file_surat']; ?>"/>
                    <input name="gambar_lama" type="hidden" value="<?= $dt['file_surat']; ?>"/>
                </div>
                
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