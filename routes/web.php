 <?php

//  error_reporting(0);
include "./assets/conn/koneksi.php";


$route=$_GET['part'];

switch ($route) {
    case '':
        include "views/beranda.php";
      break;
    case 'data-surat-masuk':
        include "views/data-surat-masuk.php";
      break;
    case 'tambah-surat-masuk':
        include "views/data-surat-masuk-tambah.php";
      break;
    case 'ubah-surat-masuk':
        include "views/data-surat-masuk-ubah.php";
      break;
    case 'detail-surat-masuk':
        include "views/data-surat-masuk-detail.php";
      break;
    case 'aksi-surat-masuk':
        include "controllers/suratMasukController.php";
      break;

    default:
        include "views/not-found.php";
  }

// /*====================================================================================================================*/

// elseif ($mod=='kelola-berita'){
//     include "modul/kelola-berita/index.php";
// }

// elseif ($mod=='detail-berita'){
//     include "modul/kelola-berita/detail.php";
// }

// elseif ($mod=='add-berita'){
//     include "modul/kelola-berita/add.php";
// }

// elseif ($mod=='update-berita'){
//     include "modul/kelola-berita/update.php";
// }

// elseif ($mod=='aksi-berita'){
//     include "modul/kelola-berita/aksi.php";
// }
// /