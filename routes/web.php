 <?php

//  error_reporting(0);
include "./assets/conn/koneksi.php";


$route=$_GET['part'];

switch ($route) {
    case '':
        include "views/beranda.php";
      break;
    // Jenis Surat
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
    // Surat Keluar
    case 'data-surat-keluar':
        include "views/surat-keluar/data-surat-keluar.php";
      break;
    case 'tambah-surat-keluar':
        include "views/surat-keluar/data-surat-keluar-tambah.php";
      break;
    case 'ubah-surat-keluar':
        include "views/surat-keluar/data-surat-keluar-ubah.php";
      break;
    case 'detail-surat-keluar':
        include "views/surat-keluar/data-surat-keluar-detail.php";
      break;
    case 'aksi-surat-keluar':
        include "controllers/suratKeluarController.php";
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

     // Info
    case 'data-info':
        include "views/info/data-info.php";
      break;
    case 'tambah-info':
        include "views/info/data-info-tambah.php";
      break;
    case 'ubah-info':
        include "views/info/data-info-ubah.php";
      break;
    case 'aksi-info':
        include "controllers/infoController.php";
      break;

    default:
        include "views/not-found.php";
  }

// /*====================================================================================================================*/