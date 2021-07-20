<?php
date_default_timezone_set('Asia/Jakarta');
    session_start();
    include('assets/conn/koneksi.php');

    //Buat konfigurasi upload
    //Folder tujuan upload file
    $eror		= false;
    $folder		= 'assets/files';
    //type file yang bisa diupload
    $file_type	= array('pdf');
    //tukuran maximum file yang dapat diupload
    $max_size	= 2000000; // 2MB
    
    if(isset($_POST['load_regist'])){
    	//Mulai memorises data
        
        $company_name = $_POST['company_name'];
        $company_address = $_POST['company_address'];
        $personal_ic = $_POST['personal_ic'];
        $contact_number = '+'.$_POST['negara'].$_POST['contact_number'];
        $email = $_POST['email'];
        $vessel_name = $_POST['vessel_name'];
        $vessel_flag = $_POST['vessel_flag'];
        $vessel_imo = 'IMO'.$_POST['vessel_imo'];
        $port_date = $_POST['port_date'];
        $port_time = $_POST['port_time'];
        $security_count = $_POST['security_count'];
        $days = $_POST['days'];
        $regist_date = date("Y-m-d H:i:s");
        
    	$nama_file	= $_FILES['data_upload']['tmp_name'];
    	$file_name	= $_FILES['data_upload']['name'];
		
    	$file_size	= $_FILES['data_upload']['size'];
    	//cari extensi file dengan menggunakan fungsi explode
    	$explode	= explode('.',$file_name);
    	$extensi	= $explode[count($explode)-1];
    	
    	$namabaru = "form_company_".$company_name.'_'.$regist_date.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/files/$file";
    
    	//check apakah type file sudah sesuai
    	if(!in_array($extensi,$file_type)){
    		$eror   = true;
    		$pesan .= "The File Format Must Be Pdf";
    	}
    	if($file_size > $max_size){
    		$eror   = true;
    		$pesan .= " - File size exceeds the maximum limit 2mb";
    	}
    	//check ukuran file apakah sudah sesuai
    
    	if($eror == true){
    		echo "<script>alert('.$pesan.');</script>";
    	}
    	else{
    		//mulai memproses upload file
    		if(move_uploaded_file("$nama_file","$folder")){
    			//catat nama file ke database
    			$query = "INSERT into regist (name_of_company, address_of_company, pic, pic_contact, pic_email, name_of_vessel, flag_of_vessel, imo_of_vessel, port_entry_date, port_entry_time, number_of_personal, estimate_day, port_location, regist_form, regist_date, status_regist, status_regist_date) values ('$company_name','$company_address','$personal_ic','$contact_number','$email','$vessel_name','$vessel_flag','$vessel_imo','$port_date','$port_time','$security_count','$days','1','$folder','$regist_date','Submission','$regist_date')";
    			
    			$hasil = mysql_query($query);
                
                if ($hasil) { 
                    echo "<script>alert('Your registration is being processed, please wait for our confirmation via email');</script>" ;
                }
                else{
                    echo "<script>alert('Your Registration Failed To Sent');</script>" ;
                }
    		} else{
    			echo "<script>alert('Your Registration Failed To Sent');</script>" ;
    		}
    	}
    	session_destroy();
    }
?>

<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52115242-17"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-52115242-17');
    </script>

    <meta charset="utf-8">
    <title>Maritim Dua Satu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap HTML template and UI kit by Medium Rare">
    <!-- Begin loading animation -->
    <style>
      @keyframes hideLoader{ 0%{ width: 100%; height: 100%; } 100%{ width: 0; height: 0; } } body > div.loader{ position: fixed; background: white; width: 100%; height: 100%; z-index: 1071; opacity: 0; transition: opacity .5s ease; overflow: hidden; pointer-events: none; display: flex; align-items: center; justify-content: center; } body:not(.loaded) > div.loader{ opacity: 1; } body:not(.loaded){ overflow: hidden; } body.loaded > div.loader{ animation: hideLoader .5s linear .5s forwards; } .loading-animation{width:40px;height:40px;margin:100px auto;background-color:#009B72;border-radius:100%;animation:pulse 1s infinite ease-in-out}@keyframes pulse{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}
    </style>
    <script type="text/javascript">
      window.addEventListener("load",function(){document.querySelector('body').classList.add('loaded');});
    </script>
    <!-- End loading animation -->
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&amp;display=swap" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logos/Logo.png">
    
  </head>

  <body>
    <div class="loader">
      <div class="loading-animation"></div>
    </div>
    <!-- <div class="alert alert-dismissible d-none d-md-block bg-primary-3 text-white py-4 py-md-3 px-0 mb-0 rounded-0 border-0">
    <div class="container">
        <div class="row no-gutters align-items-md-center justify-content-center">
            <div class="col-lg-11 col-md d-flex flex-column flex-md-row align-items-md-center justify-content-lg-center">
                <div class="mb-3 mb-md-0"><strong>Intro Sale</strong> $10 per license for Jumpstart's launch. Act fast, ends soon.</div>
                <a class="btn btn-sm btn-success ml-md-3" target="_blank" href=https://themeforest.net/item/jumpstart-app-and-software-template/24207799>Redeem Offer</a>
            </div>
            <div class="col-auto position-absolute right">
                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <img src="assets/img/icons/interface/icon-x.svg" alt="Close" class="icon icon-sm bg-white" data-inject-svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div> -->
    <div class="navbar-container">
      <nav class="navbar navbar-expand-lg navbar-light" data-sticky="top">
        <div class="container">
          <a class="navbar-brand navbar-brand-dynamic-color fade-page" href="index.php">
           <img alt="Jumpstart" src="assets/img/logos/Logo.png" height="50px"> Maritim Dua Satu
          </a>
          <div class="d-flex align-items-center order-lg-3">
            
            <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target=".navbar-collapse" data-toggle="collapse" type="button">
              <img alt="Navbar Toggler Open Icon" class="navbar-toggler-open icon icon-sm" data-inject-svg src="assets/img/icons/interface/icon-menu.svg">
              <img alt="Navbar Toggler Close Icon" class="navbar-toggler-close icon icon-sm" data-inject-svg src="assets/img/icons/interface/icon-x.svg">
            </button>
          </div>
          <div class="collapse navbar-collapse order-3 order-lg-2 justify-content-lg-end" id="navigation-menu">
            <ul class="navbar-nav my-3 my-lg-0">
                <li class="nav-item">
                    <div class="dropdown">
                      <a aria-expanded="false" aria-haspopup="true" class="nav-link"  href="index.php" role="button">Home</a>
                    </div>
                </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a aria-expanded="false" aria-haspopup="true" class="nav-link"  href="index.php?part=about-us" role="button">About Us</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a aria-expanded="false" aria-haspopup="true" class="nav-link"  href="index.php?part=services" role="button">Services</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a aria-expanded="false" aria-haspopup="true" class="nav-link"  href="index.php?part=newsandinsight" role="button">News and Insight</a>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a aria-expanded="false" aria-haspopup="true" class="nav-link"  href="index.php?part=contact" role="button">Contact</a>
                </div>
              </li>
              
              <li class="nav-item">
                <div class="dropdown">
                  <a aria-expanded="false" class="btn btn-primary btn-md" role="button" data-toggle="modal" data-target="#regis-modal"><font color="white">Registration</font></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    
    <div class="modal fade" id="regis-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header text-center border-0">
            <div class="w-100 pt-4">
              <h5 class="h3">Registration Form</h5>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                <img src="assets/img/icons/interface/icon-x.svg" alt="Icon">
              </span>
            </button>
          </div>
          <div class="modal-body px-md-4 px-lg-5 pb-4 pb-lg-5">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
              <div class="form-group">
                <div>Company Name</div>
                <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
              </div>
              <div class="form-group">
                <div>Company’s Address</div>
                <input type="text" class="form-control" name="company_address" placeholder="Company’s Address" required>
              </div>
              <div class="form-group">
                <div>Personal In Charge (PIC)</div>
                <input type="text" class="form-control" name="personal_ic" placeholder="Personal In Charge (PIC)" required>
              </div>
              <div class="form-group">
                <div>Contact Number</div>
                    <div class="row">
                        <div class="col-md-5">
                            <select id="negara" name="negara" class="form-control" required>
                                <option value="">Zip Code</option>
                                <?php
                                // ambil data dari database
                                $query = "SELECT * FROM country ORDER BY name";
                                $hasil = mysql_query($query);
                                while ($row = mysql_fetch_array($hasil)) {
                                    ?>
                                    <option value="<?php echo $row['phonecode'] ?>"><?php echo $row['nicename'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <input type="number" class="form-control" name<input type="text" class="form-control" name="contact_number" placeholder="Contact Number" required>
                        </div>
                    </div>
              </div>
              <div class="form-group">
                <div>Email</div>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
              <hr>
              <div class="form-group">
                <div>Vessel Name</div>
                <input type="text" class="form-control" name="vessel_name" placeholder="Vessel Name" required>
              </div>
              <div class="form-group">
                <div>Vessel Flag</div>
                <input type="text" class="form-control" name="vessel_flag" placeholder="Vessel Flag" required>
              </div>
              <div class="form-group">
                <div>Vessel Identification Number (IMO)</div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="imo" value="IMO" readonly>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="vessel_imo" placeholder="Vessel Identification Number (IMO)" required>
                        </div>
                    </div>
              </div>
              <div class="form-group">
                <div>Port Entry Date and Time </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="port_date" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" class="form-control" name="port_time" required>
                    </div>
                    
                    
                </div>
              </div>
              <div class="form-group">
                <div>The number of security personnel required</div>
                <input type="number" class="form-control" name="security_count" placeholder="Example: 12" required>
              </div>
              <div class="form-group">
                <div>Number of days (Estimated))</div>
                <input type="number" class="form-control" name="days" placeholder="Example: 7" required>
              </div>
              
              <div class="form-group">
                <div>File Registration <small><b><font color="red">*(Max File 2 mb, format PDF)</font></b></small></div>
                <input type="file" class="form-control" name="data_upload" required>
                <small>
                    <a href="Dua_Satu_Maritime_Registration_Form.pdf">Download this </a> registration file, and fill in according to your data.
                </small>
              </div>
              
              <div class="form-group">
                  &nbsp;
              </div>
              
              
              <div class="text-center text-small mt-3">
                 <input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="index.php?part=terms-conditions">Terms and Conditions and Privacy Policy</a>
              </div>
                
              <input class="btn btn-primary btn-block" type="submit" name="load_regist" value="Register">
            </form>
          </div>
        </div>
      </div>
    </div>


 <?php 
 include "content.php";
 ?>






    <footer class="bg-primary-3 text-white links-white pb-4 footer-1">
      <div class="container">
        <div class="row">
            
          <div class="col-md-5">
            <a class="navbar-brand navbar-brand-dynamic-color fade-page" href="index.php">
                <h5><img alt="Jumpstart" src="assets/img/logos/Logo.png" height="50px"> Maritim Dua Satu</h5>
            </a>
            <div>
                Maritim Dua Satu is an internationally recognised provider of specialised maritime security services from offshore security to port security. 
             <br><br>
             Call any time:<br>
             +62 877-7778-6290
             <br><br>
                Jl. Sultan Hasanuddin, No. 21,
                Kel. Simapang Tetap Darul Ichsan, Kec. Dumai Barat
                Kota Dumai, Provinsi Riau
               
            </div>
          </div>
          
          
          
          
          
          <div class="col-md-4">
            <h5>News and Insight</h5>
            <ul class="list-unstyled d-flex flex-wrap">
            <?php
                $query = mysql_query("SELECT * from tbl_berita join user where user.id_user = tbl_berita.pengirim_berita order by id_berita desc limit 2");
                while($dt = mysql_fetch_array($query)){
            ?>   
              <li class="col-12 col-lg-6 col-xl-12 px-0">
                <div class="row my-2 my-md-3">
                  <a class="col-5" href="index.php?part=news-detail&id=<?= $dt['id_berita'];?>">
                    <img class="rounded img-fluid hover-fade-out" src="log/<?= $dt['foto'];?>" alt="blog.2.image">
                  </a>
                  <div class="col">
                    <a class="h6" href="index.php?part=news-detail&id=<?= $dt['id_berita'];?>"><?= $dt['judul_berita'];?></a>
                    <div class="text-small text-muted mt-2"><?= $dt['tanggal_berita'];?></div>
                  </div>
                </div>
              </li>
            <?php } ?>
            </ul>
          </div>
          
          
          <div class="col-md-3">
            <h5>Pages</h5>
            <ul class="nav flex-row flex-md-column">
              <li class="nav-item mr-3 mr-md-0">
                <a href="index.php?part=about-us" class="nav-link fade-page px-0 py-2">About Us</a>
              </li>
              <li class="nav-item mr-3 mr-md-0">
                <a href="index.php?part=services" class="nav-link fade-page px-0 py-2">Services</a>
              </li>
              <li class="nav-item mr-3 mr-md-0">
                <a href="index.php?part=newsandinsight" class="nav-link fade-page px-0 py-2">News and Insight</a>
              </li>
              <li class="nav-item mr-3 mr-md-0">
                <a href="index.php?part=contact" class="nav-link fade-page px-0 py-2">Contact</a>
              </li>
              <!--<li class="nav-item mr-3 mr-md-0">-->
              <!--  <a class="nav-link btn btn-primary btn-md" data-toggle="modal" data-target="#regis-modal">Registration</a>-->
              <!--</li>-->
            </ul>
          </div>
          
        </div>
        
        <div class="row">
          <div class="col">
            <hr>
          </div>
        </div>
        <div class="row flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
          <div class="col-auto">
            <div class="d-flex flex-column flex-sm-row align-items-center text-small">
              <div class="text-muted">&copy; 2020 Maritim Dua Satu
              </div>
            </div>
          </div>

        </div>
      </div>
    </footer>
    <a href="#top" class="btn btn-primary rounded-circle btn-back-to-top" data-smooth-scroll data-aos="fade-up" data-aos-offset="2000" data-aos-mirror="true" data-aos-once="false">
      <img src="assets/img/icons/interface/icon-arrow-up.svg" alt="Icon" class="icon bg-white" data-inject-svg>
    </a>
    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <!-- 
             This appears in the demo only.  This script ensures our demo countdowns are always showing a date in the future 
             by altering the date before the countdown is initialized 
        -->
    <script type="text/javascript">
      (($) => {
            var now             = new Date;
            var day             = 864e5;
            var weeksToAdd      = 2;
            var tenWeeksFromNow = new Date(+now + day * 7 * weeksToAdd).toISOString().slice(0,10).replace(/\-/g, 'index-2.html');
            $('[data-countdown-date].add-countdown-time').attr('data-countdown-date', tenWeeksFromNow);
          })(jQuery);
    </script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- AOS (Animate On Scroll - animates elements into view while scrolling down) -->
    <script type="text/javascript" src="assets/js/aos.js"></script>
    <!-- Clipboard (copies content from browser into OS clipboard) -->
    <script type="text/javascript" src="assets/js/clipboard.min.js"></script>
    <!-- Fancybox (handles image and video lightbox and galleries) -->
    <script type="text/javascript" src="assets/js/jquery.fancybox.min.js"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="assets/js/flatpickr.min.js"></script>
    <!-- Flickity (handles touch enabled carousels and sliders) -->
    <script type="text/javascript" src="assets/js/flickity.pkgd.min.js"></script>
    <!-- Ion rangeSlider (flexible and pretty range slider elements) -->
    <script type="text/javascript" src="assets/js/ion.rangeSlider.min.js"></script>
    <!-- Isotope (masonry layouts and filtering) -->
    <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
    <!-- jarallax (parallax effect and video backgrounds) -->
    <script type="text/javascript" src="assets/js/jarallax.min.js"></script>
    <script type="text/javascript" src="assets/js/jarallax-video.min.js"></script>
    <script type="text/javascript" src="assets/js/jarallax-element.min.js"></script>
    <!-- jQuery Countdown (displays countdown text to a specified date) -->
    <script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>
    <!-- jQuery smartWizard facilitates steppable wizard content -->
    <script type="text/javascript" src="assets/js/jquery.smartWizard.min.js"></script>
    <!-- Plyr (unified player for Video, Audio, Vimeo and Youtube) -->
    <script type="text/javascript" src="assets/js/plyr.polyfilled.min.js"></script>
    <!-- Prism (displays formatted code boxes) -->
    <script type="text/javascript" src="assets/js/prism.js"></script>
    <!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
    <script type="text/javascript" src="assets/js/scrollMonitor.js"></script>
    <!-- Smooth scroll (animation to links in-page)-->
    <script type="text/javascript" src="assets/js/smooth-scroll.polyfills.min.js"></script>
    <!-- SVGInjector (replaces img tags with SVG code to allow easy inclusion of SVGs with the benefit of inheriting colors and styles)-->
    <script type="text/javascript" src="assets/js/svg-injector.umd.production.js"></script>
    <!-- TwitterFetcher (displays a feed of tweets from a specified account)-->
    <script type="text/javascript" src="assets/js/twitterFetcher_min.js"></script>
    <!-- Typed text (animated typing effect)-->
    <script type="text/javascript" src="assets/js/typed.min.js"></script>
    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="assets/js/theme.js"></script>
    <!-- This script appears only on the demo.  It is used to delay unnecessary image loading until after the main page content is loaded. -->
    <script type="text/javascript">
      window.addEventListener("load",function(){
            setTimeout(function() {
              const delayedImages = document.querySelectorAll('[data-delay-src]');
              theme.mrUtil.forEach(delayedImages, (index, elem) => {
                const source = elem.getAttribute('data-delay-src');
                elem.removeAttribute('data-delay-src');
                elem.setAttribute('src', source);
              });
            }, 500);
          });
    </script>

    <script type="text/javascript">
      // This script appears only in the demo - it disables forms with no action attribute to prevent 
      // navigating away from the page.
      jQuery("form:not([action])").on('submit', function(){return false;});
    </script>

  </body>



</html>
