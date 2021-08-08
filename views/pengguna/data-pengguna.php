<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Pengguna</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Pengguna</div>
          <div class="card-body">
              <div class="table-responsive">
                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">
                  <i class="fa fa-plus"></i> Tambah Data
                </button>
                <br><br>
                <?php
                  $sqll = "select * from tbl_user order by nama";
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><p align="center">No.</p></th>
                      <th><p align="center">Nama</p></th>
                      <th><p align="center">Username</p></th>
                      <th><p align="center">Level</p></th>
                      <th><p align="center">Status</p></th>
                      <th><p align="center">Edit</p></th>
                      <!-- <th><p align="center">Hapus</p></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $nomor=1;
                    while($data = mysql_fetch_array($resultt)){
                  ?>              
                    <tr>
                      <td><?= $nomor++; ?></td>
                      <td><?= $data['nama'];?></td>
                      <td><?= $data['username'];?></td>
                      <td><?= $data['level'];?></td>
                      <td align="center">
                        <?php if($data['status']=='1'){ ?>
                          <form action="admin.php?part=aksi-pengguna" method="post" onClick="return confirm('Apakah Anda Yakin Ingin Menonaktifkan Pengguna Ini?')">
                              <input type="hidden" name="parm" value="change_status_bos">
                              <input type="hidden" value="<?=$data['id_user'];?>" name="idnya">
                              <input type="hidden" value="0" name="new_status">
                              <button type="submit" class="btn btn-success" style="width: 70px"> Aktif</button>
                          </form>
                        <?php } else { ?>
                          <form action="admin.php?part=aksi-pengguna" method="post" onClick="return confirm('Apakah Anda Yakin Ingin Mengaktifkan Pengguna Ini?')">
                              <input type="hidden" name="parm" value="change_status_bos">
                              <input type="hidden" value="<?=$data['id_user'];?>" name="idnya">
                              <input type="hidden" value="1" name="new_status">
                              <button type="submit" class="btn btn-danger" style="width: 70px"> Nonaktif</button>
                          </form>
                        <?php } ?>
                      </td>
                      <td align="center">
                        <a class="btn btn-warning" id="tombolUbah" data-toggle="modal" data-target="#modal-edit-<?=$data['id_user'];?>" style="width: 70px"> <font color="white"><i class="fa fa-edit"></i> Edit</font>
                        </a>
                      </td>
                      <!-- <td align="center">
                        <form action="admin.php?part=aksi-pengguna" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                            <input type="hidden" name="parm" value="delete_bos">
                            <input type="hidden" value="<?=$data['id_user'];?>" name="idnya">
                            <button type="submit" class="btn btn-danger" style="width: 70px"><i class="fa fa-fw fa-trash" style="color: white"></i> Hapus</button>
                        </form>
                      </td> -->
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
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form action="admin.php?part=aksi-pengguna" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type="hidden" name="parm" value="add_bos">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" name="username" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password" name="password" minlength="6" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Level</label>
                  <select name="level" class="form-control" required>
                      <option value="0">Pilih Level Pengguna</option>
                      <option value="Umum">Umum</option>  
                      <option value="Pimpinan">Pimpinan</option>
                  </select>
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
    $sqll = "select * from tbl_user order by nama";
    $resultt = mysql_query($sqll);
    while($data = mysql_fetch_array($resultt)){
  ?> 
  <div class="modal fade" id="modal-edit-<?= $data['id_user'];?>">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <form action="admin.php?part=aksi-pengguna" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Edit Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type='hidden' name='id_user' class="form-control" value="<?= $data['id_user'];?>">  
                <input type="hidden" name="parm" value="update_bos">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama" value="<?= $data['nama'];?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" name="username" value="<?= $data['username'];?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password" name="password">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Level</label>
                  <select name="level" class="form-control" required>
                    <option value="0" disabled>Pilih Level Pengguna</option>
                    <option value="Umum" <?php if($data['level']== "Umum"){echo "selected";} ?>>Umum</option> 
                    <option value="Pimpinan" <?php if($data['level']== "Pimpinan"){echo "selected";} ?>>Pimpinan</option>
                  </select>
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