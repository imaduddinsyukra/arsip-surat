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
        <li class="breadcrumb-item active">Data Disposisi Surat</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Disposisi Surat</div>
        <div class="card-body">
          <div class="table-responsive">
          <!-- <a href="index.php?p=tambah_surat_keluar" class="btn btn-success mb-3"><i class="fa fa-plus"></i> <font size="3"><u>Tambah Data</u></font></a></div><br> -->

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
  include ("../config/koneksi.php");
  $level = $_SESSION['level']; 
  if($level == "Umum"){
    $sqll = "select * from tbl_disposisi where tujuan_disposisi = 'Umum' or tujuan_disposisi = 'Kepala Sekolah' order by id_disposisi desc";
  }
  else{
    $sqll = "select * from tbl_disposisi where tujuan_disposisi = '$level' order by id_disposisi desc";
  }
    $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>            
              <thead>
                <tr>
                    <th>NO</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Tujuan Disposisi</th>
                    <th>Sifat</th>
                    <th>Batas Waktu</th>
                    <th>Disposisi Lanjutan</th>
                    <!-- <th>File</th> -->
                    <th><p align="center">Detail</p></th>       
                <!-- </tr>
                <tr>
                    <th><p align="center">Detail</p></th>
                    <th><p align="center">Edit</p></th>
                    <th><p align="center">Hapus</p></th> -->
                </tr>
              </thead>
              
              <tbody>
<?php
  $nomor=1;
  while($data = mysql_fetch_array($resultt)){
    $no_surat = $data['no_surat'];
?>              
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $data['no_surat'];?></td>
                  <td><?php echo $data['jenis_surat'];?></td>
                  <td><?php echo $data['tujuan_disposisi'];?></td>
                  <td><b><?php echo $data['sifat'];?></b></td>
                  <td><?php echo $data['batas_waktu'];?></td>
                  <!-- <td>
                    <img src="<?= $data['gambar']; ?>" class="zoomD" alt="" style="width: 100px"/>
                  </td> -->

                  <td align="center">
<?php 
  $cek_disposisi = "select * from tbl_disposisi where no_surat = '$no_surat' and id_user = '5'";
  $lihat = mysql_query($cek_disposisi);
  if(mysql_num_rows($lihat) > 0){
    $hasil = mysql_fetch_array($lihat);
?>              

<a href="index.php?p=detail_disposisi&id_disposisi=<?php echo $hasil['id_disposisi']; ?>" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Lihat Disposisi</font></a>
<?php } else { ?>

                  <?php if($data['jenis_surat']=="Surat Masuk"){ ?>
                  <?php 
                    $que=mysql_query("select * from tbl_surat_masuk where no_surat='$no_surat'");
                    $cek = mysql_fetch_array($que);
                  ?>
                    <a href="index.php?p=tambah_disposisi_surat_masuk&id_surat_masuk=<?php echo $cek['id_surat_masuk']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-clipboard" style="color: white"></i> <font color="white">Tambah Disposisi</font></a>
                  <?php } elseif($data['jenis_surat']=="Surat Keluar") { ?>
                  <?php 
                    $que=mysql_query("select * from tbl_surat_keluar where no_surat='$no_surat'");
                    $cek = mysql_fetch_array($que);
                  ?>
                    <a href="index.php?p=tambah_disposisi_surat_keluar&id_surat_keluar=<?php echo $cek['id_surat_keluar']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-clipboard" style="color: white"></i> <font color="white">Tambah Disposisi</font></a>
                  <?php } ?>
<?php } ?>                  
                  </td>


                  <td align="center">
                    <a href="index.php?p=detail_disposisi&id_disposisi=<?php echo $data['id_disposisi']; ?>" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
                  </td>
                  <!-- <td align="center">
                    <a href="index.php?p=update_surat_masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil"></i> Edit</a>
                  </td>
                  <td align="center">
                    <a href="index.php?p=hapus_surat_masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>" onClick="return confirm('Apakah Anda Yakin Hapus Data?')" class="btn btn-danger mb-3"><i class="fa fa-fw fa-trash"></i> Hapus</a>
                  </td> -->
                </tr>
<?php
  }
?>
              </tbody>
            </table>
<?php
  }else{
    echo 'Data not found!';
    echo mysql_error();
  }
?>            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

