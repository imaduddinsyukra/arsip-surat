<?php
  $id = $_GET['id_surat_masuk']; //get the no which will updated
  $queryy = mysql_query("SELECT * FROM tbl_surat_masuk join tbl_user using (id_user) join tbl_jenis_surat using (id_jenis_surat) WHERE id_surat_masuk = '$id'"); //get the data that will be updated
  $dt=mysql_fetch_array($queryy);

?>

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
        <li class="breadcrumb-item active">Detail Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Detail Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">

          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
          <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
          <div class="card-columns">

            <!-- Example Social Card-->
            <div class="card mb-3">
                No. Surat 
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['no_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Tanggal Surat
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_surat']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Pengirim
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['pengirim']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Jenis Surat
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['jenis_surat']; ?>" readonly>
            </div>
            
            <div class="card mb-3">
                Tanggal Diterima
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['tgl_diterima']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Diterima Oleh
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['nama']; ?>" readonly>
            </div>

            <div class="card mb-3">
                Keterangan
              <input type="text" name="nama" class="form-control-rounded form-control" required="" value="<?php echo $dt['keterangan']; ?>" readonly>
            </div>

            <!-- <div class="card mb-3">
            Berkas Scan Surat<br>
              <a href="pages/download_berkas_masuk.php?id_surat_masuk=<?php echo $dt['id_surat_masuk']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Berkas</font></a>

              
            </div> -->
            <!-- Example Social Card-->
            
          </div>

          <p align="right">
            <a href="<?= $dt['file_surat']; ?>" class="btn btn-success mb-3" target="_blank"> <i class="fa fa-fw fa-download" style="color: white"></i> <font color="white">Download Surat</font></a>
          </p>

          
          <!-- /Card Columns-->
 

          <div class="row">
            <div class="col-12" align="center">
              <?php 
                $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);

                echo "APAAA";
                echo "<br/>";
                echo $base_url;
                echo "<br/>";
                echo $_SERVER['DOCUMENT_ROOT'];
                echo "<br/>";
              ?>
            <!-- <iframe class="doc" src="https://docs.google.com/gview?url=http://kampus-programmer.com/assets/files/Surat_Masuk_KPAI_Riau_2021-07-25_23_21_33.doc&embedded=true" style="width: 100%; height: 500px"></iframe> -->
            <iframe class="doc" src="https://docs.google.com/gview?url=<?= $dt['file_surat']; ?>&embedded=true" style="width: 100%; height: 500px"></iframe>
            </div>
          </div>

            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->