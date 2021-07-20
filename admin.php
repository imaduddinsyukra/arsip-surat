<?php
include "assets/conn/cek.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi Pengarsipan Surat</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/acc/logo.png">
  <!-- Bootstrap core CSS-->
  <link href="assets/acc/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/acc/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets/acc/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/acc/css/sb-admin.css" rel="stylesheet">
  <!-- CSS FOTO -->
  <link href="assets/acc/css/style-foto.css" rel="stylesheet">
  <!-- DROPIFY -->
  <link rel="stylesheet" href="assets/acc/dropify/dist/css/demo.css">
  <link rel="stylesheet" href="assets/acc/dropify/dist/css/dropify.min.css">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin.php"><img src="assets/acc/logo.png" width="10%"> &nbsp; Sistem Informasi Pengarsipan Surat</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Beranda</span>
          </a>
        </li>

        <?php if($_SESSION['level']=="Superadmin"){ ?>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="index.php?p=laporan_surat_masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="index.php?p=laporan_surat_keluar">Surat Keluar</a>
            </li>
          </ul>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link" href="index.php?p=user">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">User</span>
          </a>
        </li>

        
        <?php } elseif($_SESSION['level']=="Umum"){ ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Masuk">
          <a class="nav-link" href="admin.php?part=data-surat-masuk">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Surat Masuk</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
          <a class="nav-link" href="admin.php?part=data-surat-keluar">
            <i class="fa fa-fw fa-envelope-open"></i>
            <span class="nav-link-text">Surat Keluar</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
          <a class="nav-link" href="admin.php?part=data-disposisi">
            <i class="fa fa-fw fa-envelope-square"></i>
            <span class="nav-link-text">Disposisi</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-print"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="admin.php?part=laporan-surat-masuk">Surat Masuk</a>
            </li>
            <li>
              <a href="admin.php?part=laporan-surat-masuk">Surat Keluar</a>
            </li>
          </ul>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link" href="admin.php?part=data-user">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">User</span>
          </a>
        </li>

        <?php } elseif($_SESSION['level']=="Kepala Sekolah"){ ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
          <a class="nav-link" href="index.php?p=disposisi_surat">
            <i class="fa fa-fw fa-envelope-square"></i>
            <span class="nav-link-text">Disposisi</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
          <a class="nav-link" href="index.php?p=disposisi_lanjutan">
            <i class="fa fa-fw fa-envelope-square"></i>
            <span class="nav-link-text">Disposisi Lanjutan</span>
          </a>
        </li>

        <?php } else { ?>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Surat Keluar">
          <a class="nav-link" href="index.php?p=disposisi_surat">
            <i class="fa fa-fw fa-envelope-square"></i>
            <span class="nav-link-text">Disposisi</span>
          </a>
        </li>

        <?php } ?>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">        
        <li class="nav-item">
          <a class="nav-link">
            <i class="fa fa-fw fa-user"></i>Selamat Datang <u><b><?=$_SESSION['nama'];?></b></u> | </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

<!-- ======================================== BODY ======================================== -->
<!-- ======================================== BODY ======================================== -->
<!-- ======================================== BODY ======================================== -->
<!-- ======================================== BODY ======================================== -->
<!-- ======================================== BODY ======================================== -->
<!-- ======================================== BODY ======================================== -->



<?php 
 include "routes/web.php";
 ?>

<!-- ====================================== END BODY ====================================== -->
<!-- ====================================== END BODY ====================================== -->
<!-- ====================================== END BODY ====================================== -->
<!-- ====================================== END BODY ====================================== -->
<!-- ====================================== END BODY ====================================== -->
<!-- ====================================== END BODY ====================================== -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2020 Sistem Informasi Pengarsipan Surat SMK Muhammadiyah 3 Pekanbaru</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Apakah Anda Yakin Ingin Keluar?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" style="color: white">Cancel</button>
            <a class="btn btn-primary" href="../config/logout.php" style="color: white">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/acc/vendor/jquery/jquery.min.js"></script>
    <script src="assets/acc/vendor/popper/popper.min.js"></script>
    <script src="assets/acc/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/acc/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="assets/acc/vendor/datatables/jquery.dataTables.js"></script>
    <script src="assets/acc/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/acc/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="assets/acc/js/sb-admin-datatables.min.js"></script>
    <!-- JS FOTO -->
    <script src="assets/acc/js/js-foto.js"></script>
    <!-- DROPIFY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="assets/acc/dropify/dist/js/dropify.min.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>

  </div>
</body>

</html>