<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Disposisi Surat</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Disposisi Surat</div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="admin.php?part=tambah-disposisi" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a></div><br> -->
                <?php
                  $level = $_SESSION['level']; 
                  if($level == "Umum"){
                    $sqll = "select * from tbl_disposisi where tujuan_disposisi = 'Umum' or tujuan_disposisi = 'Pimpinan' order by id_disposisi desc";
                  }
                  else{
                    $kategori_surat = $_GET['kategori'];

                    $sqll = "SELECT * from tbl_disposisi where tujuan_disposisi = '$level' and kategori_surat = '$kategori_surat' order by id_disposisi desc"; 
                  }
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th><p align="center">No.</p></th>
                        <th><p align="center">No. Agenda</p></th>
                        <th><p align="center">No. Surat</p></th>
                        <th><p align="center">Kategori Surat</p></th>
                        <th><p align="center">Tujuan Disposisi</p></th>
                        <!-- <th><p align="center">Sifat</p></th> -->
                        <th><p align="center">Status</p></th>
                        <th><p align="center">Detail</p></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $nomor=1;
                    while($data = mysql_fetch_array($resultt)){
                      $no_surat = $data['no_surat'];
                  ?>              
                    <tr>
                      <td><?= $nomor++; ?></td>
                      <td><?= $data['no_agenda'];?></td>
                      <td><?= $data['no_surat'];?></td>
                      <td><?= $data['kategori_surat'];?></td>
                      <td><?= $data['tujuan_disposisi'];?></td>
                      <!-- <td><?= $data['sifat'];?></td> -->
                      <td><b><?= $data['status_disposisi'];?></b></td>
                      <td align="center">
                        <?php if($level == "Umum"){ ?>
                          <a href="admin.php?part=detail-disposisi&kategori_surat=<?= $data['kategori_surat'];?>&kode=2&id_disposisi=<?= $data['id_disposisi']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
                        <?php } else { ?>
                          <a href="admin.php?part=detail-disposisi-lanjutan&kategori_surat=<?= $data['kategori_surat'];?>&kode=1&id_disposisi=<?= $data['id_disposisi']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
                        <?php } ?>
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
                


<!-- ==========================================================================   -->
              </div>
            </div>
        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->