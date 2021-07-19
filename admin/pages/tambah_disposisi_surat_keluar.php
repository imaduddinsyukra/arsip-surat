<?php
  include("../config/koneksi.php");  
  ?>
  <?php
$id = $_GET['id_surat_keluar']; //get the no which will updated
$kd = $_GET['kd'];

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
          <a href="#">Disposisi Surat Keluar</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Disposisi Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Tambah Data Disposisi Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
 

<form action="index.php?p=prosestambahdisposisikeluar" method="post" enctype="multipart/form-data">
    <div class="form-group mb-4">
        <label>No. Surat *</label>
        <input type='text' name='no_surat' class="form-control" value="<?= $dt['no_surat'];?>" required readonly="">
    </div>
    <div class="form-group">
        <label>Jenis Surat</label>
        <input type='text' name='jenis_surat' class="form-control" required value="Surat Keluar" readonly="">
    </div>
    <div class="form-group mb-4">
        <label>Tujuan *</label>
        <?php if($data['level']=='Kepala Sekolah'){ ?>
          <select class="form-control-rounded form-control" name="tujuan_disposisi" required="">
            <option value="Umum">Umum</option>
            <option value="Humas">Humas</option>
            <option value="Kesiswaan">Kesiswaan</option>
            <option value="Kurikulum">Kurikulum</option>
            <option value="Keuangan">Keuangan</option>
            <option value="Perpustakaan">Perpustakaan</option>
            <option value="Sarana Prasarana">Sarana Prasarana</option>
            <option value="Kepala Sekolah">Kepala Sekolah</option>
        </select>
        <?php } elseif($data['level']=='Umum' || $data['level']=='Admin') { ?>
          <input type='text' name='tujuan_disposisi' class="form-control" value="Kepala Sekolah" readonly="">
        <?php } ?>
    </div>

    <div class="form-group mb-4">
        <label>Isi Disposisi </label>
        <input type='text' name='isi_disposisi' class="form-control">
    </div>

    <div class="form-group mb-4">
        <label>Sifat *</label>
        <select name="sifat" class="form-control" required>
          <option value="">Pilih Sifat</option>
          <option value="Biasa">Biasa</option>  
          <option value="Segera">Segera</option>  
          <option value="Perlu Perhatian Khusus">Perlu Perhatian Khusus</option>   
          <option value="Perhatian Batas Waktu">Perhatian Batas Waktu</option>  
      </select>
    </div>

    <div class="form-group mb-4">
        <label>Batas Waktu *</label>
        <input type='date' name='batas_waktu' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Catatan</label>
        <input type='text' name='catatan' class="form-control">
    </div>

    <input type='hidden' name='id_user' value="<?php echo $data['id_user']; ?>" required>   
    <input type='hidden' name='id_surat_keluar' value="<?php echo $id; ?>" required>   
    <input type='hidden' name='kd' value="<?php echo $kd; ?>" required>   

    
    <button type="submit" class="btn btn-sm btn-success login-submit-cs">Simpan</button>
</form>



            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->