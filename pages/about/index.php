 <div class="o-hidden" data-overlay>
      <section class="pb-0">
        <div class="container">
          <div class="row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div class="col-md-9 col-lg-6 col-xl-5 pl-lg-5 pl-xl-0 order-lg-2" data-aos="fade-left" data-aos-delay="250">
              <h1 class="display-3">About <mark data-aos="highlight-text" data-aos-delay="500">Maritim Dua Satu</mark></h1>
              <p class="lead">
<?php
$query = mysql_query("SELECT * FROM content where category_content = 'History'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){

?>
                <?= $dt['page_content'];?>
<?php } ?>                
              </p>
             <!--  <a href="#" class="lead">Meet the crew</a> -->
            </div>
            <div class="col-md-8 col-lg-6 mt-4 mt-md-5 mt-lg-0 order-lg-1" data-aos="fade-right">
<?php
$query = mysql_query("SELECT * FROM image_content where category_content = 'History'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>                
              <img src="log/<?= $dt['foto'];?>" alt="Image" class="rounded img-fluid shadow-lg">
<?php } ?>               
            </div>
          </div>
        </div>
        <div class="position-absolute w-50 h-100 top right" data-jarallax-element="50">
          <div class="blob bg-primary opacity-20 w-100 h-100 top left"></div>
        </div>
        <div class="divider divider-bottom bg-primary-3"></div>
      </section>
    </div>

        <section class="bg-primary-3 text-white">
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h3 class="display-4">Our Galery</h3>
            <!-- <div class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</div> -->
          </div>
        </div>
      </div>
      <div class="o-hidden">
        <div class="highlight-selected" data-flickity='{ "imagesLoaded": true, "wrapAround":true }'>
<?php
$abc=1;
$query = mysql_query("SELECT * FROM image_content where category_content = 'Gallery' and status='Aktif'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){

?>            
          <div class="carousel-cell text-center col-9 col-md-7 col-lg-5">
            <img class="img-fluid rounded" src="log/<?= $dt['foto'];?>" alt="<?= "blog".$abc++."image";?>">
          </div>
<?php } ?>

        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center justify-content-around text-center text-lg-left">
          <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-md-5 mb-lg-0 order-lg-2" data-aos="fade-in">
            <h2 class="h1">Our Vision</h2>
            <p class="lead">
<?php
$query = mysql_query("SELECT * FROM content where category_content = 'Vision'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){

?>
                <?= $dt['page_content'];?>
<?php } ?>                
             </p>
          </div>
          <div class="col-md-9 col-lg-6 col-xl-5 order-lg-1" data-aos="fade-in">
<?php
$query = mysql_query("SELECT * FROM image_content where category_content = 'Vision'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>                
            <img src="log/<?= $dt['foto'];?>" alt="Image" class="img-fluid rounded shadow">
<?php } ?>        
          </div>
        </div>
      </div>
    </section>
    <section class="pt-0 o-hidden">
      <div class="container">
        <div class="row align-items-center justify-content-around text-center text-lg-left">
          <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-md-5 mb-lg-0 pl-lg-5 pl-xl-0">
            <div data-aos="fade-in" data-aos-offset="250">
              <h2 class="h1">Our Mission</h2>
              <p class="lead"></p>
            </div>
            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
<!--================================================                -->
                <?php
                $no=1;
                $query = mysql_query("SELECT * FROM content where category_content = 'Mission'"); //get the data that will be updated
                while($dt = mysql_fetch_array($query)){
                
                ?>
                <div class="mb-3 mr-4 ml-lg-0 mr-lg-4" data-aos="fade-left" data-aos-delay="<?=$no++.'00';?>">
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle bg-success-alt">
                        <img src="assets/img/icons/interface/icon-check.svg" alt="Layouts icon" class="m-2 icon icon-xs bg-success" data-inject-svg>
                      </div>
                      <h6 class="mb-0 ml-3"><?= $dt['page_content'];?></h6>
                    </div>
                </div>
                <?php } ?> 
<!--================================================-->
            </div>
          </div>
          <div class="col-md-9 col-lg-6 col-xl-5" data-aos="fade-in" data-aos-offset="250">
<?php
$query = mysql_query("SELECT * FROM image_content where category_content = 'Mission'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){

?>              
            <img src="log/<?= $dt['foto'];?>" alt="Image" class="img-fluid rounded shadow">
<?php } ?>            
          </div>
        </div>
      </div>
    </section>


    <!--  <section class="p-0 bg-light">
      <div class="container">
        <div class="row align-items-center justify-content-around">
          <div class="col-md-9 col-lg-5" data-aos="fade-in">
            <img src="assets/img/square-5.jpg" alt="Image" class="img-fluid rounded shadow">
            <img src="assets/img/square-4.jpg" alt="Image" class="position-absolute p-0 col-4 col-xl-5 border border-white border-thick rounded-circle top right shadow-lg mt-5 mr-n5 mr-lg-n3 mr-xl-n5 d-none d-md-block" data-jarallax-element="-20 0">
          </div>
          <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-md-5 mb-lg-0 pl-lg-5 pl-xl-0">
          
            <div class="text-center text-lg-left">
              <h2 class="h1">Vision & Mission of Maritim 21</h2>
              <p class="lead">Berspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>

            <div id="faq-accordion">
              <div class="card mb-2 mb-md-3">
                <a href="#accordion-1" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 mr-2">Our Vision</h6>
                    <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>
                  </div>
                </a>
                <div class="collapse" id="accordion-1" data-parent="#faq-accordion">
                  <div class="px-3 px-md-4 pb-3 pb-md-4">
                    Menjadi perusahaan penyedia layanan keamanan maritim terkemuka dan terpercaya yang unggul dalam kinerja, sumber daya dan layanan.
                  </div>
                </div>
              </div>
              <div class="card mb-2 mb-md-3">
                <a href="#accordion-2" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                  <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 mr-2">Our Mission</h6>
                    <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>
                  </div>
                </a>
                <div class="collapse" id="accordion-2" data-parent="#faq-accordion">
                  <div class="px-3 px-md-4 pb-3 pb-md-4">
                <ul>
                <li>
                  Menyediakan produk dan layanan keamanan maritim yang berkualitas tinggi.
                </li>
                <li>
                  Membangun jaringan pemasaran dan hubungan kerjasama yang saling menguntungkan dengan para pihak yang terkait dengan jasa keamanan maritim.
                </li>
                <li>
                  Meningkatkan nilai-nilai perusahaan dengan membentuk sumber daya manusia yang memiliki integritas dan komitmen tinggi.
                </li>
                <li>
                  Membangun prasarana dan sarana pendukung kegiatan operasional perusahaan untuk mencapai kinerja yang optimal.
                </li>
              </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        

        </div>
      </div>
      <div class="divider divider-bottom bg-white"></div>
    </section> -->