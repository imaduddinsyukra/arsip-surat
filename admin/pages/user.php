<div id="lb-back">
  <div id="lb-img"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">User</a>
        </li>
        <li class="breadcrumb-item active">Data User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data User</div>
        <div class="card-body">
          <div class="table-responsive">
          <a href="index.php?p=tambah_user" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" style="color: white"><u>Tambah Data</u></font></a></div><br>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
  include ("../config/koneksi.php");
  $sqll = "select * from tbl_user order by id_user desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>            
              <thead>
                <tr>
                    <th >No.</th>
                    <th >Nama</th>
                    <th >Username</th>
                    <th >Level</th>
                    <th >Status</th>
                    <th><p align="center">Edit</p></th>       
                </tr>
              </thead>
              
              <tbody>
<?php
  $nomor=1;
  while($data = mysql_fetch_array($resultt)){
?>              
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $data['nama'];?></td>
                  <td><?php echo $data['username'];?></td>
                  <td><?php echo $data['level'];?></td>
                  <td align="center">
                    <?php if($data['status']=='1'){ ?>
                      <a href="index.php?p=ganti_status&id=<?php echo $data['id_user'];?>&status=<?php echo $data['status'];?>" onClick="return confirm('Apakah Anda Yakin Menonaktifkan User Ini?')" class="btn btn-success mb-3" style="width: 100px"> <font color="white"> Aktif</font></a>
                    <?php } elseif($data['status']=='0') { ?>
                      <a href="index.php?p=ganti_status&id=<?php echo $data['id_user'];?>&status=<?php echo $data['status'];?>" onClick="return confirm('Apakah Anda Yakin Mengaktifkan User Ini?')" class="btn btn-danger mb-3" style="width: 100px"> <font color="white">Nonaktif</font></a>
                    <?php } ?>
                  </td>
                  <td align="center">
                    <a href="index.php?p=edit_user&id=<?php echo $data['id_user']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color:white"></i> <font color="white">Edit</font></a>
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

