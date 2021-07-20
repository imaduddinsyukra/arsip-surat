<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<?php
session_start();
include('assets/conn/koneksi.php');
if(isset($_POST['load']))
{
    if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
    echo "<script>alert('Incorrect verification code');</script>" ;
    } 
     else {
         
        $nama = $_POST['contact_name'];
        $email =$_POST['contact_email'];
        $perusahaan = $_POST['contact_company'];
        $telpon = '+'.$_POST['negara'].$_POST['contact_phone'];
        $pesan = $_POST['contact_message'];
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s");

        $query = "INSERT into kritik_saran (nama, email, perusahaan, telpon, pesan, tgl) values ('$nama','$email','$perusahaan','$telpon','$pesan','$tgl')" ;
        $hasil = mysql_query($query);
        if ($hasil) { 
            echo "<script>alert('Your Message Has Been Sent');</script>" ;
        }
        else{
            echo "<script>alert('Your Message Failed To Sent');</script>" ;
        }
    }
    session_destroy();
}
?>
    <div class="bg-primary-3 text-white p-0" data-overlay>
      <img src="assets/img/page/contact/contact-us.png" alt="Image" class="bg-image opacity-60">
      <section class="pb-0">
        <div class="container pb-5">
          <div class="row justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h1 class="display-3">We’re here to help</h1>
              <p class="lead mb-0"></p>

            </div>
          </div>
        </div>
        <div class="divider divider-bottom"></div>
      </section>
    </div>
    <section class="pb-0">
      <div class="container">
        <div class="row section-title justify-content-center text-center">
          <div class="col-md-9 col-lg-8 col-xl-7">
            <h3 class="display-4">Get in touch</h3>
            <div class="lead">Contact us anytime and anywhere you are.</div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-9 col-xl-8">
            <form method="post" action="">
              <div class="form-row">
                <div class="col-sm">
                  <div class="form-group">
                    <label for="contact-name">Your Name</label>
                    <input type="text" name="contact_name" class="form-control" id="contact-name" required>
                    <div class="invalid-feedback">
                      Please type your name.
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="contact-email">Email Address</label>
                    <input type="email" name="contact_email" class="form-control" id="contact-email" placeholder="you@website.com" required>
                    <div class="invalid-feedback">
                      Please provide your email address.
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-sm">
                  <div class="form-group">
                    <label for="contact-company">Company (optional)</label>
                    <input type="text" name="contact_company" class="form-control" id="contact-company" required>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="contact-phone">Phone (optional)</label>
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
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="contact-phone">&nbsp;</label>
                        <input type="number" name="contact_phone" class="form-control" id="contact-phone" required style="200px">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="contact-message">Message</label>
                <textarea id="contact-message" name="contact_message" rows="10" class="form-control" required></textarea>
                <div class="invalid-feedback">
                  Please tell us a little more.
                </div>
              </div>
              <div class="col-sm">
                  <div class="form-group">
                    <label for="contact-name">Captcha</label>
                   <div align="center">
                        <img src="assets/conn/captcha.php" style="width: 100px">
                   </div>
                   <br>
                    <input type="text" name="vercode" class="form-control" id="contact-name" required>
                    <?php if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
                    ?>
                    <div class="invalid-feedback">
                      Incorrect verification code
                    </div>
                    <?php } ?>
                  </div>
                </div>
              <div class="form-row">
                <div class="col">
                  <div class="d-none alert alert-success" role="alert" data-success-message>
                    Thanks, a member of our team will be in touch shortly.
                  </div>
                  <div class="d-none alert alert-danger" role="alert" data-error-message>
                    Please fill all fields correctly.
                  </div>
                  <div class="d-flex justify-content-end">
                    <input class="btn btn-primary btn-loading" type="submit" data-loading-text="Sending" name="load" value="Send Message">
                      <!-- Icon for loading animation -->
                      <svg class="icon bg-white" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>Icon For Loading</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g>
                            <polygon points="0 0 24 0 24 24 0 24" opacity="0"></polygon>
                          </g>
                          <path d="M12,4 L12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,10.9603196 17.7360885,9.96126435 17.2402578,9.07513926 L18.9856052,8.09853149 C19.6473536,9.28117708 20,10.6161442 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z"
                          fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 12.000000) scale(-1, 1) translate(-12.000000, -12.000000) "></path>
                        </g>
                      </svg>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-auto" data-aos="fade-up">
            <div class="px-md-4 px-lg-5 mb-5 mb-md-0">
              <h5>Email us</h5>
              <a href="mailto:support@maritimduasatu.com" class="lead">support@maritimduasatu.com</a>
            </div>
          </div>
          <div class="col-md-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="px-md-4 px-lg-5 mb-5 mb-md-0">
              <h5>Call any time</h5>
              <a href="tel:+6287777786290" class="lead">+62 877-7778-6290</a>
            </div>
          </div>
          <div class="col-md-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="px-md-4 px-lg-5 mb-5 mb-md-0">
              <h5>Drop in</h5>
              <address>
                <p>Jl. Sultan Hasanuddin, No. 21,</p>
                <p>Kel. Simapang Tetap Darul Ichsan, Kec. Dumai Barat</p>
                <p>Kota Dumai, Provinsi Riau</p>

              </address>
              <a href="#">Get Directions</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="divider divider-bottom bg-primary-3"></div>