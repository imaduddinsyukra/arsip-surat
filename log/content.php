<?php

 error_reporting(0);
include "config/koneksi.php";

// Bagian Home

// Bagian Modul


$mod=$_GET[part];

if ($mod==''){
    include "modul/home/home.php";
}

/*=========================================================================*/

elseif ($mod=='profil'){
    include "modul/home/profil.php";
}


elseif ($mod=='aksi-profil'){
    include "modul/home/aksi.php";
}



/*=========================================================================*/

elseif ($mod=='kelola-registrasi'){
    include "modul/kelola-registrasi/index.php";
}

elseif ($mod=='detail-registrasi'){
    include "modul/kelola-registrasi/detail.php";
}

elseif ($mod=='aksi-registrasi'){
    include "modul/kelola-registrasi/aksi.php";
}

/*=========================================================================*/

elseif ($mod=='page-home'){
    include "modul/website/home/index.php";
}

elseif ($mod=='add-page-home'){
    include "modul/website/home/add.php";
}

elseif ($mod=='aksi-page-home'){
    include "modul/website/home/aksi.php";
}

elseif ($mod=='page-about-history'){
    include "modul/website/about/history.php";
}
elseif ($mod=='page-about-gallery'){
    include "modul/website/about/gallery.php";
}

elseif ($mod=='add-about-gallery'){
    include "modul/website/about/add_gallery.php";
}

elseif ($mod=='page-about-vision'){
    include "modul/website/about/vision.php";
}
elseif ($mod=='page-about-mission'){
    include "modul/website/about/mission.php";
}

elseif ($mod=='add-about-mission'){
    include "modul/website/about/add_mission.php";
}

elseif ($mod=='aksi-page-about'){
    include "modul/website/about/aksi.php";
}

elseif ($mod=='page-services'){
    include "modul/website/services/index.php";
}

elseif ($mod=='aksi-page-services'){
    include "modul/website/services/aksi.php";
}

elseif ($mod=='add-services'){
    include "modul/website/services/add.php";
}

elseif ($mod=='page-services-why'){
    include "modul/website/services/why.php";
}

elseif ($mod=='add-services-why'){
    include "modul/website/services/add_why.php";
}

elseif ($mod=='page-terms'){
    include "modul/website/terms/index.php";
}

elseif ($mod=='aksi-page-terms'){
    include "modul/website/terms/aksi.php";
}


/*====================================================================================================================*/

elseif ($mod=='kelola-berita'){
    include "modul/kelola-berita/index.php";
}

elseif ($mod=='detail-berita'){
    include "modul/kelola-berita/detail.php";
}

elseif ($mod=='add-berita'){
    include "modul/kelola-berita/add.php";
}

elseif ($mod=='update-berita'){
    include "modul/kelola-berita/update.php";
}

elseif ($mod=='aksi-berita'){
    include "modul/kelola-berita/aksi.php";
}
/*====================================================================================================================*/

elseif ($mod=='kelola-saran'){
    include "modul/kelola-saran/index.php";
}

elseif ($mod=='hapus-saran'){
    include "modul/kelola-saran/aksi.php";
}

/*====================================================================================================================*/
