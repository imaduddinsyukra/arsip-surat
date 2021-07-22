<div class="col-12">
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-surat-masuk">
          <i class="fa fa-plus"></i> Tambah Data
        </button>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <?php
        $sqll = "select * from tbl_surat_masuk order by created_at desc";
        $resultt = mysql_query($sqll);
          if(mysql_num_rows($resultt) > 0){
      ?> 
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">No. Surat</th>
            <th rowspan="2">Tanggal Surat</th>
            <th rowspan="2">Pengirim</th>
            <th colspan="3"><p align="center">Pilihan</p></th>
          </tr>
          <tr>
            <th>Disposisi</th>
            <th>Detail</th>
            <th>Ubah</th>
          </tr>
          </thead>
          <tbody>
          <?php
            $nomor=1;
            while($data = mysql_fetch_array($resultt)){
            $no_surat = $data['no_surat'];
          ?>   
            <tr>
              <td style="width:3%"><?php echo $nomor++; ?></td>
              <td><?php echo $data['no_surat'];?></td>
              <td><?php echo $data['tgl_surat'];?></td>
              <td><?php echo $data['pengirim'];?></td>
              <td>
                <a href="admin.php?part=detail-surat-masuk&id_surat_masuk=<?= $data['id_surat_masuk']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
              </td>
              <td>
                <?php 
                  $cek_disposisi = "select * from tbl_disposisi where no_surat = '$no_surat'";
                  $lihat = mysql_query($cek_disposisi);
                  if(mysql_num_rows($lihat) > 0){
                    $hasil = mysql_fetch_array($lihat);
                ?>
                  <a href="admin.php?part=detail-disposisi&id_disposisi=<?php echo $hasil['id_disposisi']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Lihat Disposisi</font></a>
                <?php } else { ?>
                  <form action="admin.php?part=tambah-disposisi" method="post">
                      <input type="hidden" value="Surat Masuk" name="jenis_surat">
                      <input type="hidden" value="<?=$data['id_surat_masuk'];?>" name="id_surat">
                      <input type="hidden" value="1" name="kode">
                      <button type="submit" class="btn btn-primary mb-3" value="Tambah Disposisi"><i class="fa fa-fw fa-clipboard" style="color: white"></i> Tambah Disposisi</button>
                  </form>
                <?php } ?>
              </td>
              <td align="center">
                <a class="btn btn-warning" id="tombolUbah" data-toggle="modal" data-target="#modal-edit-<?=$data['id_surat_masuk'];?>" data-uuid="<?=$data['id_surat_masuk'];?>" data-pengirim="<?= $data['pengirim'];?>" data-nosurat="<?= $data['no_surat'];?>" data-tglsurat="<?= $data['tgl_surat'];?>" data-tglditerima="<?= $data['tgl_diterima'];?>" data-keterangan="<?= $data['keterangan'];?>" data-filesurat="<?= $data['file_surat'];?>"><i class="fa fa-edit"></i> Edit
                </a>
              </td>
            </tr>
            <?php
              }
            ?>
        </table>
        <?php
          }else{
            echo '<h3 align="center">Data Tidak Ditemukan!</h3>';
            echo mysql_error();
          }
        ?> 
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

   <!-- modal Tambah -->
  <div class="modal fade" id="modal-surat-masuk">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{url('surat-masuk/create')}}" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Surat Masuk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan UUID" name="uuid" required>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID User" name="id_user" required>
                  <label for="exampleInputEmail1">No. Surat</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Surat" name="no_surat">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Surat</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Surat" name="tgl_surat">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pengirim</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Pengirim Surat" name="pengirim">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Diterima</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Diterima" name="tgl_diterima">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <textarea class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keterangan Jika Diperlukan" name="keterangan"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="file_surat">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
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
    $sqll = "select * from tbl_surat_masuk order by created_at desc";
    $resultt = mysql_query($sqll);
    while($data = mysql_fetch_array($resultt)){
  ?> 
  <div class="modal fade" id="modal-edit-<?= $data['id_surat_masuk'];?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="admin.php?part=aksi-surat-masuk" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Edit Surat Masuk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="card-body">
                <input type='hidden' name='id_surat_masuk' class="form-control" value="<?= $data['id_surat_masuk'];?>">
                <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required>   
                <input type="hidden" name="parm" value="update_bos">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">No. Surat</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Surat" name="no_surat" value="<?= $data['no_surat'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Surat</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Surat" name="tgl_surat" value="<?= $data['tgl_surat'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pengirim</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Pengirim Surat" name="pengirim" value="<?= $data['pengirim'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Diterima</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Diterima" name="tgl_diterima" value="<?= $data['tgl_diterima'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <textarea class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keterangan Jika Diperlukan" name="keterangan"><?= $data['keterangan'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="200" data-default-file="<?= $data['file_surat']; ?>"/>
                  <input name="gambar_lama" type="hidden" value="<?= $data['file_surat']; ?>"/>
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