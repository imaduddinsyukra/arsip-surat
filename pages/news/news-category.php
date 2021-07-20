<?php
    $category=$_GET['id'];
?>
 <section class="bg-light">
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h2 class="display-4">News Category: <?= $category;?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
<!-- =========== -->    
<?php
$page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
$limit = 6;
$limitStart = ($page - 1) * $limit;

    $query = mysql_query("SELECT * from tbl_berita join user where user.id_user = tbl_berita.pengirim_berita and kategori_berita='$category' order by id_berita desc limit ".$limitStart.",".$limit);
    while($dt = mysql_fetch_array($query)){
?>   
            <div class="mb-4 mb-md-5" data-aos="fade-up">
              <div class="d-flex flex-column flex-lg-row no-gutters border rounded bg-white o-hidden">
                <a href="index.php?part=news-detail&id=<?= $dt['id_berita'];?>" class="d-block position-relative bg-gradient col-xl-5">
                  <img class="flex-fill hover-fade-out" src="log/<?= $dt['foto'];?>" alt="blog.2.image">
                  <div class="divider divider-side bg-white d-none d-lg-block"></div>
                </a>
                <div class="p-4 p-md-5 col-xl-7 d-flex align-items-center">
                  <div class="p-lg-4 p-xl-5">
                    <div class="d-flex justify-content-between align-items-center mb-3 mb-xl-4">
                      <a href="index.php?part=news-category&id=<?= $dt['kategori_berita'];?>" class="badge badge-pill badge-success"><?= $dt['kategori_berita'];?></a>
                      <div class="text-small text-muted"><?= $dt['tanggal_berita'];?></div>
                    </div>
                    <a href="index.php?part=news-detail&id=<?= $dt['id_berita'];?>">
                      <h1><?= $dt['judul_berita'];?></h1>
                    </a>
                    <p class="lead">
                        <?= substr($dt['isi_berita'],0,120);?>...
                    </p>
                    <a href="index.php?part=news-detail&id=<?= $dt['id_berita'];?>" class="lead">Read More</a>
                  </div>
                </div>
              </div>
            </div>
<?php } ?>            

<!-- =============== -->          
          </div>
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-auto">
            <nav>
              <ul class="pagination">
<?php
    // Jika page = 1, maka LinkPrev disable
    if($page == 1){ 
?>        
        <!-- link Previous Page disable -->                  
                <li class="disabled">
                  <a class="page-link rounded" href="#" aria-label="Previous">
                    <img src="assets/img/icons/interface/icon-arrow-left.svg" alt="Arrow Left" class="icon icon-xs bg-primary" data-inject-svg>
                  </a>
                </li>
<?php
    }
    else{ 
    $LinkPrev = ($page > 1)? $page - 1 : 1;
?>
    <!-- link Previous Page --> 
                <li class="page-item">
                  <a class="page-link rounded" href="index.php?part=newsandinsight&page=<?php echo $LinkPrev; ?>" aria-label="Previous">
                    <img src="assets/img/icons/interface/icon-arrow-left.svg" alt="Arrow Left" class="icon icon-xs bg-primary" data-inject-svg>
                  </a>
                </li>
<?php
    }
?>                
  
  
<?php
    $SqlQuery = mysql_query("SELECT * FROM tbl_berita");        
    
    //Hitung semua jumlah data yang berada pada tabel Sisawa
    $JumlahData = mysql_num_rows($SqlQuery);
    
    // Hitung jumlah halaman yang tersedia
    $jumlahPage = ceil($JumlahData / $limit); 
    
    // Jumlah link number 
    $jumlahNumber = 1; 
    
    // Untuk awal link number
    $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
    
    // Untuk akhir link number
    $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
    
    for($i = $startNumber; $i <= $endNumber; $i++){
      $linkActive = ($page == $i)? ' class="page-item active"' : '';
?>
                
                <li <?php echo $linkActive; ?>><a class="page-link" href="index.php?part=newsandinsight&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
<?php
    }
?>                
                
        <!-- link Next Page -->
<?php       
    if($page == $jumlahPage){ 
?>                
                <li class="disabled">
                  <a class="page-link rounded" href="#" aria-label="Next">
                    <img src="assets/img/icons/interface/icon-arrow-right.svg" alt="Arrow Right" class="icon icon-xs bg-primary" data-inject-svg>
                  </a>
                </li>
<?php
    }
    else{
        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
?>                
                <li class="page-item">
                  <a class="page-link rounded" href="index.php?part=newsandinsight&page=<?php echo $linkNext; ?>" aria-label="Next">
                    <img src="assets/img/icons/interface/icon-arrow-right.svg" alt="Arrow Right" class="icon icon-xs bg-primary" data-inject-svg>
                  </a>
                </li>
<?php
    }
?>                
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>