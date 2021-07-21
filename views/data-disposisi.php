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
                    $sqll = "select * from tbl_disposisi where tujuan_disposisi = '$level' order by id_disposisi desc";
                  }
                  $resultt = mysql_query($sqll);
                    if(mysql_num_rows($resultt) > 0){
                ?> 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tujuan Disposisi</th>
                        <th>Sifat</th>
                        <th>Batas Waktu</th>
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
                      <td><?php echo $nomor++; ?></td>
                      <td><?php echo $data['no_surat'];?></td>
                      <td><?php echo $data['jenis_surat'];?></td>
                      <td><?php echo $data['tujuan_disposisi'];?></td>
                      <td><b><?php echo $data['sifat'];?></b></td>
                      <td><?php echo $data['batas_waktu'];?></td>
                      <td align="center">
                        <a href="admin.php?part=detail-disposisi&id_disposisi=<?= $data['id_disposisi']; ?>" class="btn btn-success mb-3"> <i class="fa fa-fw fa-eye" style="color: white"></i> <font color="white">Detail</font></a>
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