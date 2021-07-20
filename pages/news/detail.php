<?php
$id = $_GET['id']; //get the no which will updated
$link = "http://maritimduasatu.com/index.php?part=newsandinsight"; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_berita join user where user.id_user = tbl_berita.pengirim_berita and id_berita = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>

<section class="p-0 border-top border-bottom bg-light row no-gutters">
      <div class="col-lg-5 col-xl-6 order-lg-2">
        <div class="divider divider-side transform-flip-y bg-light d-none d-lg-block"></div>
        <img class="flex-fill" src="log/<?= $dt['foto'];?>" alt="blog.1.image">
      </div>
      <div class="col-lg-7 col-xl-6">
        <div class="container min-vh-lg-70 d-flex align-items-center">
          <div class="row justify-content-center">
            <div class="col col-md-10 col-xl-9 py-4 py-sm-5">
              <div class="my-4 my-md-5">
                <div class="d-flex align-items-center mb-3 mb-xl-4">
                  <a href="index.php?part=news-category&id=<?= $dt['kategori_berita'];?>" class="badge badge-pill badge-danger"><?= $dt['kategori_berita'];?></a>
                  <div class="ml-3 text-small text-muted"><?= $dt['tanggal_berita'];?></div>
                </div>
                <h1 class="display-4">
              <?= $dt['judul_berita'];?>
            </h1>
                <a href="#" class="d-flex align-items-center">
                  <img src="assets/img/avatars/male-1.jpg" alt="Joshua Lapinsky profile image" class="avatar avatar-sm">
                  <div class="h6 mb-0 ml-3"><?= $dt['nama'];?></div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-10">
<!--==========================================================              -->
            <article class="article">
                <?= $dt['isi_berita'];?>
            </article>
<!--=============================================================            -->
            <div class="mt-4 mt-sm-5 border-top pt-5 d-none d-sm-block">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.php?part=newsandinsight">News and Insight</a>
                  </li>
                  <li class="breadcrumb-item"><a href="index.php?part=news-category&id=<?= $dt['kategori_berita'];?>"><?= $dt['kategori_berita'];?></a>
                  </li>
                </ol>
              </nav>
            </div>
            <div class="my-4 my-sm-5 card card-body flex-sm-row justify-content-between align-items-center">
              <div class="h5 mb-sm-0">Share this article:</div>
              <div class="d-flex">
                <a href="https://twitter.com/intent/tweet?url=<?= $link;?>" class="btn btn-sm btn-primary rounded-circle mx-1" target="blank">
                  <img src="assets/img/icons/social/twitter.svg" alt="Twitter" class="icon icons-m bg-white" data-inject-svg>
                </a>
                <a href="http://www.facebook.com/sharer.php?u=<?= $link;?>" class="btn btn-sm btn-primary rounded-circle mx-1" target="blank">
                  <img src="assets/img/icons/social/facebook.svg" alt="Facebook" class="icon icons-m bg-white" data-inject-svg>
                </a>
                <!--<a href="#" class="btn btn-sm btn-primary rounded-circle mx-1">
                  <img src="assets/img/icons/social/linkedin.svg" alt="Linked In" class="icon icons-m bg-white" data-inject-svg>
                </a>-->
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    </section>