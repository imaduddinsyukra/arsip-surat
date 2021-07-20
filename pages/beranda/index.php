    <section class="p-0 border-top border-bottom row no-gutters">
      <div class="col-lg-7 col-xl-6">
        <div class="container min-vh-lg-80 d-flex align-items-center">
          <div class="row justify-content-center">
            <div class="col col-md-10 col-xl-9 text-center text-lg-left">
              <section>
                <div data-aos="fade-right">
                  <h2 class="display-3"><mark data-aos="highlight-text" data-aos-delay="200">Maritim</mark><br> Dua Satu</h2>
                  <p class="lead">
                    Trust the safety of your ship to us. We are ready to provide secure your ship in a professional manner with a competent security personnel!
                  </p>
                </div>
                <div class="d-flex flex-column flex-sm-row mt-4 mt-md-5 justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="300">
                  <a class="btn btn-primary btn-lg mx-sm-2 mx-lg-0 mr-lg-2 my-1 my-sm-0" data-toggle="modal" data-target="#regis-modal"><font color="white">Register Now!</font></a>
         <!--          <a href="https://themeforest.net/item/jumpstart-app-and-software-template/24207799" class="btn btn-outline-primary btn-lg mx-sm-2 mx-lg-0 mr-lg-2 my-1 my-sm-0">Purchase</a> -->
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-6 d-lg-flex flex-lg-column">
        <div class="divider divider-side transform-flip-y bg-white d-none d-lg-block"></div>
        <div class="d-lg-flex flex-column flex-fill controls-hover" data-flickity='{ "imagesLoaded": true, "wrapAround":true, "pageDots":false, "autoPlay":true }'>
<!--======================================================-->            
        <?php
                $query = mysql_query("SELECT * from image_content where category_content='Homepage' and status='Aktif'");
                while($dt = mysql_fetch_array($query)){
            ?>   
          <div class="carousel-cell text-center">
            <img class="img-fluid" src="log/<?= $dt['foto'];?>" alt="Image">
          </div>
        <?php } ?>
<!--=============================================================-->          
        </div>
      </div>
    </section>

    <section class="bg-light o-hidden">
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h2 class="display-4">Easy steps to secure your boat</h2>
            <div class="lead">The security we offer is best in class. Get our security services for the convenience of your business.</div> <!-- kami akan memberikan yang terbaik untuk keamanan bisnis anda -->
          </div>
        </div>
        <div class="row align-items-center justify-content-around">
          <div class="col-md-9 col-lg-5" data-aos="fade-in">
            <img src="assets/img/page/home/how_to_regist.jpg" alt="Image" class="img-fluid rounded shadow">
            <!--<img src="assets/img/5.jpg" alt="Image" class="position-absolute p-0 col-4 col-xl-5 border border-white border-thick rounded-circle top left shadow-lg mt-5 ml-n5 ml-lg-n3 ml-xl-n5 d-none d-md-block" data-jarallax-element="-20 0">-->
          </div>
          <div class="col-md-9 col-lg-6 col-xl-5 mt-4 mt-md-5 mt-lg-0">
            <ol class="list-unstyled p-0">
              <li class="d-flex align-items-start my-4 my-md-5">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-success">
                  <div class="position-absolute text-white h5 mb-0">1</div>
                </div>
                <div class="ml-3 ml-md-4">
                  <h4>Click the registration menu</h4>
                  <p>
                    Click the registration menu so you can go to the registration page
                  </p>
                 <!--  <a href="#">Create one now</a> -->
                </div>
              </li>
              <li class="d-flex align-items-start my-4 my-md-5">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-success">
                  <div class="position-absolute text-white h5 mb-0">2</div>
                </div>
                <div class="ml-3 ml-md-4">
                  <h4>Fill the form</h4>
                  <p>
                   Fill in the form provided according to your valid company data
                  </p>
                </div>
              </li>
              
              <li class="d-flex align-items-start my-4 my-md-5">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-success">
                  <div class="position-absolute text-white h5 mb-0">3</div>
                </div>
                <div class="ml-3 ml-md-4">
                  <h4>Wait for confirmation</h4>
                  <p>
                    Wait for confirmation from us via our official email
                  </p>
                </div>
              </li>
              
              <li class="d-flex align-items-start my-4 my-md-5">
                <div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center bg-success">
                  <div class="position-absolute text-white h5 mb-0">4</div>
                </div>
                <div class="ml-3 ml-md-4">
                  <h4>Run your business comfortably</h4>
                  <p>
                    Once your registration has been confirmed, you can continue your business with a sense of secure and comfort
                  </p>
                </div>
              </li>
              
            </ol>
          </div>
        </div>
      </div>
    </section>

     <section class="bg-primary-3 pt-0 text-white">
      <div class="divider divider-top transform-flip-x bg-white"></div>
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h3 class="display-4">What do you get?</h3>
            <div class="lead">By entrusting your security, you will get a variety of excellent services. Register now !</div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-9 col-lg-10">
            <div class="row justify-content-center">
<!--===============================================--> 
<?php
$abcd=1;
$query = mysql_query("SELECT * FROM content where category_content = 'Why'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>                  
              <div class="col-md-6 mb-3 mb-md-4" data-aos="fade-up" data-aos-delay="<?= $abcd++."0";?>">
                <div class="card card-body bg-white min-vh-md-30 hover-box-shadow">
                  <div class="flex-fill">
                    <h4 class="h3" align="center"><?= $dt['page_content'];?></h4>
                  </div>
                </div>
              </div>
              
<?php } ?>              
<!--=====================================-->              
              
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <!-- <section class="p-0">-->
    <!--  <div class="divider divider-top bg-light transform-flip-x"></div>-->
    <!--  <div class="container">-->
    <!--    <div class="row section-title justify-content-center text-center">-->
    <!--      <div class="col-md-9 col-lg-8 col-xl-7">-->
    <!--        <h3 class="display-4">FAQ</h3>-->
    <!--        <div class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--    <div class="row justify-content-center">-->
    <!--      <div class="col-md-10 col-lg-8">-->
    <!--        <div id="faq-accordion">-->
    <!--          <div class="card mb-2 mb-md-3">-->
    <!--            <a href="#accordion-1" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">-->
    <!--              <div class="d-flex justify-content-between align-items-center">-->
    <!--                <h6 class="mb-0 mr-2">Can I upgrade later on?</h6>-->
    <!--                <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>-->
    <!--              </div>-->
    <!--            </a>-->
    <!--            <div class="collapse" id="accordion-1" data-parent="#faq-accordion">-->
    <!--              <div class="px-3 px-md-4 pb-3 pb-md-4">-->
    <!--                Integer ut Oberyn massa. Sed feugiat vitae turpis a porta. Aliquam sagittis interdum Melisandre. Vivamus ornare pharetra diam sit amet tincidunt. Eunuch sit amet pharetra odio. Vivamus in tempor ipsum, sit amet elementum neque. Sed faucibus posuere pharetra.-->
    <!--                In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus vitae rutrum. Donec eu commodo nunc. Mauris dignissim lectus massa, eget cursus quam mollis id. Eddard sit amet ex Jon nibh maximus cursus at vitae mi. Duis tincidunt-->
    <!--                aliquam mi sed sagittis.-->

    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="card mb-2 mb-md-3">-->
    <!--            <a href="#accordion-2" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">-->
    <!--              <div class="d-flex justify-content-between align-items-center">-->
    <!--                <h6 class="mb-0 mr-2">Can I port my data from another provider?</h6>-->
    <!--                <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>-->
    <!--              </div>-->
    <!--            </a>-->
    <!--            <div class="collapse" id="accordion-2" data-parent="#faq-accordion">-->
    <!--              <div class="px-3 px-md-4 pb-3 pb-md-4">-->
    <!--                Eunuch nec dapibus ex. Aenean placerat, ex imp convallis dictum, ex nulla rutrum justo, Jon lobortis nisi ex at leo. Sed Tyrion aliquet sem vel pharetra. Vestibulum ante ipsum primis in faucibus Hodor luctus et ultrices posuere cubilia Curae; Class aptent-->
    <!--                taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis a sapien quis quam auctor feugiat. Donec volutpat condimentum risus, eu iaculis nibh dapibus eu.-->

    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="card mb-2 mb-md-3">-->
    <!--            <a href="#accordion-3" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">-->
    <!--              <div class="d-flex justify-content-between align-items-center">-->
    <!--                <h6 class="mb-0 mr-2">Are my food photos stored forever in the cloud?</h6>-->
    <!--                <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>-->
    <!--              </div>-->
    <!--            </a>-->
    <!--            <div class="collapse" id="accordion-3" data-parent="#faq-accordion">-->
    <!--              <div class="px-3 px-md-4 pb-3 pb-md-4">-->
    <!--                Volantisi fringilla, unuch eu sagittis sagittis, urna Loras luctus odio, vitae hendrerit massa dui ac est. Donec leo tortor, Tyrion et aliquet at, convallis imp mi. Vivamus turpis diam, ultrices et tempus quis, sollicitudin et risus. Pellentesque nec-->
    <!--                sapien imp dolor condimentum condimentum ut sed neque. Integer efficitur accumsan risus, vitae posuere massa aliquam at.-->

    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="card mb-2 mb-md-3">-->
    <!--            <a href="#accordion-4" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">-->
    <!--              <div class="d-flex justify-content-between align-items-center">-->
    <!--                <h6 class="mb-0 mr-2">Who foots the bill for that?</h6>-->
    <!--                <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>-->
    <!--              </div>-->
    <!--            </a>-->
    <!--            <div class="collapse" id="accordion-4" data-parent="#faq-accordion">-->
    <!--              <div class="px-3 px-md-4 pb-3 pb-md-4">-->
    <!--                Khaleesi ornare pharetra diam sit amet tincidunt. Eunuch sit amet pharetra odio. Vivamus in tempor ipsum, sit amet elementum neque. Sed faucibus posuere pharetra. In imperdiet eleifend dui a aliquet. Aliquam imperdiet Tyrion purus vitae rutrum. Donec-->
    <!--                eu commodo nunc. Vivamus Melisandre Jon lorem eget bibendum. Sed tincidunt sed enim at dignissim. Mauris erat diam, lacinia eget efficitur et, iaculis sed augue.-->

    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="card mb-2 mb-md-3">-->
    <!--            <a href="#accordion-5" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">-->
    <!--              <div class="d-flex justify-content-between align-items-center">-->
    <!--                <h6 class="mb-0 mr-2">What's the real cost?</h6>-->
    <!--                <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>-->
    <!--              </div>-->
    <!--            </a>-->
    <!--            <div class="collapse" id="accordion-5" data-parent="#faq-accordion">-->
    <!--              <div class="px-3 px-md-4 pb-3 pb-md-4">-->
    <!--                Brienne ac maximus Loras, eu placerat odio. Etiam vestibulum Loras et sollicitudin pellentesque. Mauris sed Tyrion Varys. Curabitur posuere augue risus, eget mollis unuch consectetur quis. Vestibulum accumsan congue risus, in semper eros interdum id.-->
    <!--                Tincidunt vitae libero efficitur viverra. Integer venenatis massa in dui viverra fermentum. Eunuch fringilla arcu ac urna sodales fermentum. Ut luctus enim ut sagittis consectetur.-->

    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="card mb-2 mb-md-3">-->
    <!--            <a href="#accordion-6" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">-->
    <!--              <div class="d-flex justify-content-between align-items-center">-->
    <!--                <h6 class="mb-0 mr-2">Can my company request a custom plan?</h6>-->
    <!--                <img src="assets/img/icons/interface/icon-caret-right.svg" alt="Caret Right" class="icon icon-sm" data-inject-svg>-->
    <!--              </div>-->
    <!--            </a>-->
    <!--            <div class="collapse" id="accordion-6" data-parent="#faq-accordion">-->
    <!--              <div class="px-3 px-md-4 pb-3 pb-md-4">-->
    <!--                Brienne ac maximus Loras, eu placerat odio. Etiam vestibulum Loras et sollicitudin pellentesque. Mauris sed Tyrion Varys. Curabitur posuere augue risus, eget mollis unuch consectetur quis. Vestibulum accumsan congue risus, in semper eros interdum id.-->

    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->

    <!--      </div>-->
    <!--    </div>-->
    <!--    <div class="row justify-content-center mt-4 mt-md-5">-->
    <!--      <div class="col-auto">-->
    <!--        <div class="alert bg-light">Still have unanswered questions? <a href="#">Get-->
    <!--                    in touch</a>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div class="divider divider-bottom bg-primary-3"></div>-->
    <!--</section>-->

   
   <section class="pb-0">
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h3 class="display-4">What are you waiting for?</h3>
            <div class="lead">Register now, and feel the best service from us.</div>
          </div>
        </div>
        <div class="row justify-content-center text-center mt-md-n4">
          <div class="col-auto">
            <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#regis-modal"><font color="white">Register now</font></a>
          </div>
        </div>
      </div>
      <div class="divider divider-bottom bg-primary-3 mt-5"></div>
    </section>