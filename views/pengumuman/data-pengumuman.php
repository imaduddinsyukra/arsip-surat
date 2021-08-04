<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Pengumuman</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Pengumuman</div>
          <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="admin.php?part=tambah-jenis-surat" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a> -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fa fa-plus"></i> Tambah Data
                </button>
                <br><br>
                <?php
                  $sqll = "select * from tbl_pengumuman order by created_at desc";
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><p align="center">No.</p></th>
                      <th><p align="center">Judul</p></th>
                      <th><p align="center">Isi</p></th>
                      <th><p align="center">Tanggal Terbit</p></th>
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
                      <td><?= $data['judul'];?></td>
                      <td><?= $data['isi'];?></td>
                      <td><?= $data['created_at'];?></td>
                      <td align="center">
                        <a class="btn btn-warning" id="tombolUbah" data-toggle="modal" data-target="#modal-edit-<?=$data['id_pengumuman'];?>" style="width: 70px"> <font color="white"><i class="fa fa-edit"></i> Edit</font>
                        </a>
                      </td>
                      <td align="center">
                        <form action="admin.php?part=aksi-pengumuman" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                            <input type="hidden" name="parm" value="delete_bos">
                            <input type="hidden" value="<?=$data['id_pengumuman'];?>" name="idnya">
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
                
                

                  
    <!-- modal Tambah -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="admin.php?part=aksi-pengumuman" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pengumuman</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type="hidden" name="parm" value="add_bos">
                <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Pengumuman</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Pengumuman" name="judul" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Isi Pengumuman</label>
                  <textarea placeholder="Masukkan Isi Pengumuman" class="ckeditor" id="ckedtor" name="isi" required></textarea>
                </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <!-- Modal Edit -->
  <?php
    $sqll = "select * from tbl_pengumuman order by created_at desc";
    $resultt = mysql_query($sqll);
    while($data = mysql_fetch_array($resultt)){
  ?> 
  <div class="modal fade" id="modal-edit-<?= $data['id_pengumuman'];?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="admin.php?part=aksi-pengumuman" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Edit Pengumuman</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type='hidden' name='id_pengumuman' class="form-control" value="<?= $data['id_pengumuman'];?>">  
                <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>
                <input type="hidden" name="parm" value="update_bos">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Pengumuman</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Pengumuman" name="judul" value="<?= $data['judul'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Isi Pengumuman</label>
                  <textarea placeholder="Masukkan Isi Pengumuman" class="ckeditor" id="ckedtor" name="isi" required><?= $data['isi'];?></textarea>
                </div>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
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