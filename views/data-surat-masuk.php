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
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
          </button> -->
          <a href="admin.php?part=tambah-surat-masuk" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a></div><br>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
  $sqll = "select * from tbl_surat_masuk order by created_at desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>            
              <thead>
                <tr>
                    <th>No.</th>
                    <th>No. Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Pengirim</th>
                    <th><p align="center">Detail</p></th>
                    <th><p align="center">Disposisi</p></th>
                    <th><p align="center">Edit</p></th>
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
                  <td><?php echo $data['tgl_surat'];?></td>
                  <td><?php echo $data['pengirim'];?></td>
                  <td align="center">
                    <a href="admin.php?part=detail-surat-masuk&id_surat_masuk=<?= $data['id_surat_masuk']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
                  </td>
                  <td align="center">
                  <?php 
                    $cek_disposisi = "select * from tbl_disposisi where no_surat = '$no_surat'";
                    $lihat = mysql_query($cek_disposisi);
                    if(mysql_num_rows($lihat) > 0){
                      $hasil = mysql_fetch_array($lihat);
                  ?>
                    <a href="admin.php?part=detail-disposisi&id_disposisi=<?php echo $hasil['id_disposisi']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Lihat Disposisi</font></a>
                  <?php } else { ?>
                    <a href="admin.php?part=tambah-disposisi-surat-masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>&kd=1" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-clipboard" style="color: white"></i> <font color="white">Tambah Disposisi</font></a>
                  <?php } ?>
                  </td>
                  <td align="center">
                    <a href="admin.php?part=ubah-surat-masuk&id_surat_masuk=<?php echo $data['id_surat_masuk']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Edit</font></a>
                  </td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: fixed; width: 500px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Surat Masuk</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>