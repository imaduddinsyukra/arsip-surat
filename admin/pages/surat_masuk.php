<div id="lb-back">
  <div id="lb-img"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Surat Masuk</a>
        </li>
        <li class="breadcrumb-item active">Data Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
          <a href="index.php?p=tambah_surat_masuk" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a></div><br>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
  include ("../config/koneksi.php");
  $sqll = "select * from tbl_surat_masuk order by id_surat_masuk desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>            
              <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">No Agenda</th>
                    <th rowspan="2">Perihal</th>
                    <th rowspan="2">Pengirim</th>
                    <th rowspan="2">No. Surat, Tanggal Surat</th>
                    <!-- <th rowspan="2">File</th> -->
                    <th colspan="3"><p align="center">Pilihan</p></th>       
                </tr>
                <tr>
                    <th><p align="center">Detail</p></th>
                    <th><p align="center">Disposisi</p></th>
                    <th><p align="center">Edit</p></th>
                    <!-- <th><p align="center">Hapus</p></th> -->
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
                  <td><?php echo $data['no_agenda'];?></td>
                  <td><?php echo $data['perihal'];?></td>
                  <td><?php echo $data['pengirim'];?></td>
                  <td>
                    <?php echo $data['no_surat'];?><br />
                    <i><?php echo $data['tgl_surat'];?></i>
                  </td>
                  <!-- <td>
                    <img src="<?= $data['gambar']; ?>" class="zoomD" alt="" style="width: 100px"/>
                  </td> -->
                  <td align="center">
                    <a href="index.php?p=detail_masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
                  </td>
                  <td align="center">
                  <?php 
                    $cek_disposisi = "select * from tbl_disposisi where no_surat = '$no_surat'";
                    $lihat = mysql_query($cek_disposisi);
                    if(mysql_num_rows($lihat) > 0){
                      $hasil = mysql_fetch_array($lihat);
                  ?>
                    <a href="index.php?p=detail_disposisi&id_disposisi=<?php echo $hasil['id_disposisi']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Lihat Disposisi</font></a>
                  <?php } else { ?>
                    <a href="index.php?p=tambah_disposisi_surat_masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>&kd=1" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-clipboard" style="color: white"></i> <font color="white">Tambah Disposisi</font></a>
                  <?php } ?>
                  </td>
                  <td align="center">
                    <a href="index.php?p=edit_surat_masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Edit</font></a>
                  </td>
                  <!-- <td align="center">
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

