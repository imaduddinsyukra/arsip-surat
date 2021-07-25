 <?php

//  error_reporting(0);
include "./assets/conn/koneksi.php";


$route=$_GET['part'];

switch ($route) {
    case '':
        include "views/beranda.php";
      break;
    // Surat Masuk
    case 'data-jenis-surat':
        include "views/jenis-surat/data-jenis-surat.php";
      break;
    case 'aksi-jenis-surat':
        include "controllers/jenisSuratController.php";
      break;
    // Surat Masuk
    case 'data-surat-masuk':
        include "views/surat-masuk/data-surat-masuk.php";
      break;
    case 'tambah-surat-masuk':
        include "views/surat-masuk/data-surat-masuk-tambah.php";
      break;
    case 'ubah-surat-masuk':
        include "views/surat-masuk/data-surat-masuk-ubah.php";
      break;
    case 'detail-surat-masuk':
        include "views/surat-masuk/data-surat-masuk-detail.php";
      break;
    case 'aksi-surat-masuk':
        include "controllers/suratMasukController.php";
      break;
    // Disposisi
    case 'data-disposisi':
      include "views/disposisi/data-disposisi.php";
    break;
    case 'tambah-disposisi':
      include "views/disposisi/data-disposisi-tambah.php";
    break;
    case 'detail-disposisi':
        include "views/disposisi/data-disposisi-detail.php";
      break;
    case 'aksi-disposisi':
      include "controllers/disposisiController.php";
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