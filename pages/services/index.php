

    <section class="bg-light o-hidden">
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h2 class="display-4">What we have to offer</h2>
            <div class="lead">We will provide the best for the security of your business</div> <!-- kami akan memberikan yang terbaik untuk keamanan bisnis anda -->
          </div>
        </div>
        <div class="row align-items-center justify-content-around">
          <div class="col-md-9 col-lg-5" data-aos="fade-in">
<?php
$query = mysql_query("SELECT * FROM image_content where category_content = 'Services'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>               
            <img src="log/<?= $dt['foto'];?>" alt="Image" class="img-fluid rounded shadow">
<?php } ?>              
          </div>
          <div class="col-md-9 col-lg-6 col-xl-5 mt-4 mt-md-5 mt-lg-0">
            <ol class="list-unstyled p-0">
<!--===============================================--> 
<?php
$noo=1;
$query = mysql_query("SELECT * FROM content where category_content = 'Services'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
    $content = $dt['page_content'];
    $ex=explode('#',$content);
    $title=$ex[0];
    $description=$ex[1];
?>
              <li class="d-flex align-items-start my-4 my-md-5">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-success">
                  <div class="position-absolute text-white h5 mb-0"><?= $noo++;?></div>
                </div>
                <div class="ml-3 ml-md-4">
                  <h4><?= $title;?></h4>
                  <p>
                    <?= $description;?>
                  </p>
                </div>
              </li>
<?php } ?>              
<!--=====================================-->              
            </ol>
          </div>
        </div>
      </div>
    </section>

     <section class="p-0 bg-primary text-white row no-gutters">
      <div class="col-lg-5 col-xl-6">
<?php
$query = mysql_query("SELECT * FROM image_content where category_content = 'Why'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>           
        <img src="log/<?= $dt['foto'];?>" alt="Image" class="w-100 h-100">
<?php } ?>           
        <div class="divider divider-side bg-primary d-none d-lg-block"></div>
      </div>
      <div class="col-lg-7 col-xl-6">
        <section>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col col-md-10 col-xl-9">
                <h3 class="h1">&ldquo;Why Maritim 21?&rdquo;</h3>
                <div class="row">
<!--===============================================--> 
<?php
$abc=1;
$query = mysql_query("SELECT * FROM content where category_content = 'Why'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>                    
                        <div class="col-6">
                            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                              <div class="mb-3 mr-4 ml-lg-0 mr-lg-4" data-aos="fade-left" data-aos-delay="<?= $abc."00";?>">
                                <div class="d-flex align-items-center">
                                  <div class="rounded-circle bg-dark-alt">
                                    <img src="assets/img/icons/interface/icon-check.svg" alt="Binoculars icon" class="m-2 icon icon-xs bg-white" data-inject-svg>
                                  </div>
                                  <h6 class="mb-0 ml-3"><?= $dt['page_content'];?></h6>
                                </div>
                              </div>
                            </div>
                        </div>
<?php } ?>              
<!--=====================================-->                           
                       
                    </div>
                    
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                      &nbsp;
                    </div>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                      &nbsp;
                    </div>
                    
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                      &nbsp;
                    </div>
            
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
