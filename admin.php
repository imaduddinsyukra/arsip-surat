<?php
include "assets/conn/cek.php";
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Informasi Perkantoran Berbasis Elektronik</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/acc/gambar/bengkalis.png">
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
  <link rel="stylesheet" href="assets/acc/dropify/dist/css/dropify.min.css">
  <!-- CKEDITOR -->
  <script type="text/javascript" src="assets/acc/ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/acc/ckeditor/style.css">
  <!-- END CKEDITOR -->
  <!-- FORM DINAMIS -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- END FORM DINAMIS -->


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
    include("views/layouts/sidebar.php");
  ?>

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

    <?php
      include("views/layouts/footer.php");
    ?>
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
            <a class="btn btn-primary" href="./assets/conn/logout.php" style="color: white">Logout</a>
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
