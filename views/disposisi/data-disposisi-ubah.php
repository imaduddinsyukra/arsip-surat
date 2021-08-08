<?php
  $kategori_surat = $_GET['kategori_surat'];
  $id_surat = $_GET['id_disposisi'];
  $kode = $_GET['kode'];
  
  if($kategori_surat == "Surat Masuk"){
    $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_masuk using (no_surat) WHERE id_disposisi = '$id_surat'"); //get the data that will be updated
  }
  elseif($kategori_surat == "Surat Keluar"){
    $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_keluar using (no_surat) WHERE id_disposisi = '$id_surat'"); //get the data that will be updated
  }
  elseif($kategori_surat == "Surat Pengangkatan"){
    $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_rekomendasi_pengangkatan using (no_surat) WHERE id_disposisi = '$id_surat'"); //get the data that will be updated
  }
  elseif($kategori_surat == "Surat Pemberhentian"){
    $queryy = mysql_query("SELECT * FROM tbl_disposisi join tbl_surat_rekomendasi_pemberhentian using (no_surat) WHERE id_disposisi = '$id_surat'"); //get the data that will be updated
  }
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
          <a href="#">Disposisi Surat</a>
        </li>
        <li class="breadcrumb-item active">Ubah Data Disposisi Surat</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Ubah Data Disposisi Surat</div>
        <div class="card-body">
          <div class="table-responsive">
            <p align="right">
                <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </p>

<form action="admin.php?part=aksi-disposisi" method="post" enctype="multipart/form-data">

<input type="hidden" name="parm" value="update_bos">
<input type='text' name='id_disposisi' class="form-control" value="<?= $dt['id_disposisi'];?>" required readonly="">
    <div class="form-group mb-4">
        <label>No. Surat *</label>
        <input type='text' name='no_surat' class="form-control" value="<?= $dt['no_surat'];?>" required readonly="">
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Surat *</label>
        <input type='text' name='tgl_surat' class="form-control" value="<?= $dt['tgl_surat'];?>" required readonly="">
    </div>

    <?php
      if($kategori_surat == "Surat Masuk"){
    ?>
      <div class="form-group mb-4">
          <label>Pengirim</label>
          <input type='text' name='pengirim' class="form-control" value="<?= $dt['pengirim'];?>" readonly="">
      </div>
      <?php
      } elseif($kategori_surat == "Surat Keluar"){
      ?>
        <div class="form-group mb-4">
            <label>Tujuan</label>
            <input type='text' name='tujuan' class="form-control" value="<?= $dt['tujuan'];?>" readonly="">
        </div>
      <?php } ?>


    <div class="form-group">
        <label>Kategori Surat</label>
        <input type='text' name='kategori_surat' class="form-control" required value="<?= $kategori_surat;?>" readonly="">
    </div>

    <?php
      if($kategori_surat=="Surat Masuk"){
    ?>
      <div class="form-group mb-4">
          <label>Diterima Tanggal</label>
          <input type='text' name='tgl_diterima' class="form-control" value="<?= $dt['tgl_diterima'];?>" required readonly="">
      </div>
    <?php
    } elseif($kategori_surat=="Surat Keluar"){
    ?>
      <div class="form-group mb-4">
           <label>Dicatat Tanggal</label>
           <input type='text' name='tgl_catat' class="form-control" value="<?= $dt['tgl_catat'];?>" required readonly="">
      </div>
    <?php } ?>

    <div class="form-group">
        <label>No. Agenda*</label>
        <input type='text' name='no_agenda' class="form-control" value="<?= $dt['no_agenda'];?>" required required>
    </div>

    <div class="form-group mb-4">
        <label>Sifat *</label>
        <select name="sifat" class="form-control" required>
          <option value="0">Pilih Sifat</option>
          <option value="Sangat Segera" <?php if($dt['sifat']=="Sangat Segera"){echo "selected";} ?>>Sangat Segera</option>  
          <option value="Segera" <?php if($dt['sifat']=="Segera"){echo "selected";} ?>>Segera</option>  
          <option value="Rahasia" <?php if($dt['sifat']=="Rahasia"){echo "selected";} ?>>Rahasia</option> 
      </select>
    </div>

    
    <div class="form-group mb-4">
        <label>Hal </label>
        <input type='text' name='isi_disposisi' class="form-control" value="<?= $dt['isi_disposisi'];?>" required >
    </div>


    <div class="form-group mb-4">
        <label>Diteruskan Kepada*</label>
        <?php if($_SESSION['level']=='Pimpinan'){ ?>
          <select class="form-control-rounded form-control" name="tujuan_disposisi" required="">
            <option value="Umum" selected>Umum</option>
            <option value="Pimpinan">Pimpinan</option>
            <!-- <option value="Kesiswaan">Kesiswaan</option>
            <option value="Kurikulum">Kurikulum</option>
            <option value="Keuangan">Keuangan</option>
            <option value="Perpustakaan">Perpustakaan</option>
            <option value="Sarana Prasarana">Sarana Prasarana</option>
            <option value="Kepala Sekolah">Kepala Sekolah</option> -->
        </select>
        <?php } elseif($_SESSION['level']=='Umum' || $data['level']=='Admin') { ?>
          <input type='text' name='tujuan_disposisi' class="form-control" value="Pimpinan" readonly="">
        <?php } ?>
    </div>
    <?php if($_SESSION['level']=='Pimpinan'){ ?>
    <div class="form-group mb-4">
        <label>Dengan Hormat Harap *</label>
        <select name="tindakan" class="form-control" required>
          <option value="0">Pilih Tindakan</option>
          <option value="Tanggapan dan Saran">Tanggapan dan Saran</option>  
          <option value="Proses Lebih Lanjut">Proses Lebih Lanjut</option>  
          <option value="Koordinasikan/Konfirmasikan">Koordinasikan/Konfirmasikan</option> 
      </select>
    </div>

    <div class="form-group mb-4">
        <label>Batas Waktu *</label>
        <input type='date' name='batas_waktu' class="form-control" required>
    </div>

    <?php } ?>

   

    <div class="form-group mb-4">
        <label>Catatan</label>
        <textarea type='text' name='catatan' class="form-control"><?= $dt['catatan'];?></textarea>
    </div>

    <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>   
    <input type='hidden' name='id_surat' value="<?= $id_surat; ?>" required>   
    <input type='hidden' name='kd' value="<?= $kode; ?>" required>   
    
    <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
</form>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->