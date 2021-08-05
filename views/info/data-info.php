<?php 
error_reporting(0);
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Info</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Info</div>
          <div class="card-body">
            <?php if($_SESSION['level']=="Umum"){ ?>
              <div class="table-responsive">
                <div class="row">
                  <div class="col-6">
                    <a href="admin.php?part=tambah-info" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a>
                  </div>
                  <div class="col-6">
                    <form action="" method="post">
                      <select class="form-control" name="jenis_info" onchange='this.form.submit()'>
                        <option value="" <?php if($_POST['jenis_info']==""){echo "selected";} ?> selected>Tampilkan Semua Info</option>
                        <option value="DIKLAT" <?php if($_POST['jenis_info']=="DIKLAT"){echo "selected";} ?>>DIKLAT</option>
                        <option value="BLT" <?php if($_POST['jenis_info']=="BLT"){echo "selected";} ?>>BLT</option>
                        <option value="BUMIL" <?php if($_POST['jenis_info']=="BUMIL"){echo "selected";} ?>>BUMIL</option>
                        <option value="PKH" <?php if($_POST['jenis_info']=="PKH"){echo "selected";} ?>>PKH</option>
                      </select>
                      </select>
                    </form>
                  </div>
                </div>
                <!-- 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fa fa-plus"></i> Tambah Data
                </button> -->
                <br><br>
                <?php
                  if($_POST['jenis_info']==""){
                    $sqll = "SELECT * from tbl_info join tbl_user using (id_user)";
                  }
                  else{
                    $show_jenis = $_POST['jenis_info'];
                    $sqll = "SELECT * from tbl_info join tbl_user using (id_user) where jenis_info = '$show_jenis'";
                  }
                  
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><p align="center">No.</p></th>
                      <th><p align="center">Judul</p></th>
                      <th><p align="center">Jenis</p></th>
                      <!-- <th><p align="center">Tanggal Dibuat</p></th> -->
                      <th><p align="center">Dibuat Oleh</p></th>
                      <th><p align="center">Detail</p></th>
                      <th><p align="center">Edit</p></th>
                      <th><p align="center">Hapus</p></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $nomor=1;
                    while($data = mysql_fetch_array($resultt)){
                  ?>              
                    <tr>
                      <td><?= $nomor++; ?></td>
                      <td><?= $data['judul_info'];?></td>
                      <td><?= $data['jenis_info'];?></td>
                      <!-- <td><?= $data['created_at'];?></td> -->
                      <td><?= $data['nama'];?></td>
                      <td align="center">
                        <a class="btn btn-primary" id="tombolUbah" data-toggle="modal" data-target="#modal-edit-<?=$data['id_info'];?>" style="width: 70px"> <font color="white"><i class="fa fa-eye"></i> Detail</font>
                        </a>
                      </td>
                      <td align="center">
                        <a href="admin.php?part=ubah-info&id_info=<?= $data['id_info']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Edit</font></a>
                      </td>
                      <td align="center">
                        <form action="admin.php?part=aksi-info" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                            <input type="hidden" name="parm" value="delete_bos">
                            <input type="hidden" value="<?=$data['id_info'];?>" name="idnya">
                            <button type="submit" class="btn btn-danger" style="width: 70px"><i class="fa fa-fw fa-trash" style="color: white"></i> Hapus</button>
                        </form>
                      </td>
                    </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
                <?php
                  }else{
                    echo '<h3 align="center">Data Tidak Ditemukan!</h3>';
                    echo mysql_error();
                  }
                ?>           
              
              
            <?php } elseif($_SESSION['level']=="Pimpinan"){ ?> 
              
              <div class="table-responsive">
                <div class="row">
                  <div class="col-6">
                    &nbsp;
                  </div>
                  <div class="col-6">
                    <form action="" method="post">
                      <select class="form-control" name="jenis_info" onchange='this.form.submit()'>
                        <option value="" <?php if($_POST['jenis_info']==""){echo "selected";} ?> selected>Tampilkan Semua Info</option>
                        <option value="DIKLAT" <?php if($_POST['jenis_info']=="DIKLAT"){echo "selected";} ?>>DIKLAT</option>
                        <option value="BLT" <?php if($_POST['jenis_info']=="BLT"){echo "selected";} ?>>BLT</option>
                        <option value="BUMIL" <?php if($_POST['jenis_info']=="BUMIL"){echo "selected";} ?>>BUMIL</option>
                        <option value="PKH" <?php if($_POST['jenis_info']=="PKH"){echo "selected";} ?>>PKH</option>
                      </select>
                      </select>
                    </form>
                  </div>
                </div>
                <!-- 
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fa fa-plus"></i> Tambah Data
                </button> -->
                <br><br>
                <?php
                  if($_POST['jenis_info']==""){
                    $sqll = "SELECT * from tbl_info join tbl_user using (id_user)";
                  }
                  else{
                    $show_jenis = $_POST['jenis_info'];
                    $sqll = "SELECT * from tbl_info join tbl_user using (id_user) where jenis_info = '$show_jenis'";
                  }
                  
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><p align="center">No.</p></th>
                      <th><p align="center">Judul</p></th>
                      <th><p align="center">Jenis</p></th>
                      <!-- <th><p align="center">Tanggal Dibuat</p></th> -->
                      <th><p align="center">Dibuat Oleh</p></th>
                      <th><p align="center">Detail</p></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $nomor=1;
                    while($data = mysql_fetch_array($resultt)){
                  ?>              
                    <tr>
                      <td><?= $nomor++; ?></td>
                      <td><?= $data['judul_info'];?></td>
                      <td><?= $data['jenis_info'];?></td>
                      <!-- <td><?= $data['created_at'];?></td> -->
                      <td><?= $data['nama'];?></td>
                      <td align="center">
                        <a class="btn btn-primary" id="tombolUbah" data-toggle="modal" data-target="#modal-edit-<?=$data['id_info'];?>" style="width: 70px"> <font color="white"><i class="fa fa-eye"></i> Detail</font>
                        </a>
                      </td>
                    </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
                <?php
                  }else{
                    echo '<h3 align="center">Data Tidak Ditemukan!</h3>';
                    echo mysql_error();
                  }
                ?>
                
            <?php } ?> 
                

  <!-- Modal Detail -->
  <?php
    $sqll = "SELECT * from tbl_info join tbl_user using (id_user)";
    $resultt = mysql_query($sqll);
    while($data = mysql_fetch_array($resultt)){
  ?> 
  <div class="modal fade" id="modal-edit-<?= $data['id_info'];?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Detail Info</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Judul Info</b></label>
                  <p>
                    <?= $data['judul_info'];?>
                  </p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Jenis Info</b></label>
                  <p>
                    <?= $data['jenis_info'];?>
                  </p>
                </div>
                <hr/>
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Isi Info</b></label>
                  <p>
                    <?= $data['isi_info'];?>
                  </p>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Download File Info</b></label>
                  <p>
                    <a href="<?= $data['file_surat']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download File</font></a>
                  </p>
                </div>
                <hr/>
              </div>
              <!-- /.card-body -->
              <div align="center">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> -->
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php
    }
  ?>
<!-- ==========================================================================   -->
              </div>
            </div>
        </div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->