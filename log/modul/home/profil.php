<?php
$id = $_SESSION['id_user']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM user where id_user = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b> Profil </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=profil"><font color="white">Profil</font></a></li>
                            </ol>
                        </nav>

                    </div>


                </div>
            </div>
        </div>

        <div class="container  pull-up">
         <div class="card m-b-30">
                <div class="container  m-b-30"><br>
            <div class="row">
                   <div class="col-lg-12">

                  
                  
                    <div class="card m-b-30 bg-dark text-white">
                        <div class="card-body ">
                            <!--Following uses  .form-dark class on parent to make controls appear -->
                            <!--transparent in the container-->
                            <form class="form-dark" action="index2.php?part=aksi-profil" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $dt['id_user'];?>">
                            <input type="hidden" name="parm" value="update_password_bos">
                                
                                <div class="form-row">
                                    <div class="form-group  col-md-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" placeholder="Username" name="nama" required value="<?= $dt['nama'];?>" disabled>
                                    </div>
                                    
                                    <div class="form-group  col-md-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username" required value="<?= $dt['username'];?>">
                                    </div>
                                    
                                    <div class="form-group  col-md-12">
                                        <label>Password Saat Ini</label>
                                        <input type="password" class="form-control" placeholder="Password Saat Ini" name="current_password" required>
                                    </div>
                                    
                                    <div class="form-group  col-md-12">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="pw1">
                                    </div>
                                    
                                    <div class="form-group  col-md-12">
                                        <label>Ulangi Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="ulangipassword" id="pw2">
                                        
                                        <input type="hidden" class="form-control" placeholder="Password" name="password_lama" required value="<?= $dt['password'];?>">
                                    </div>
                                </div>
                               
                                <input type="submit" class="btn btn-success" style="float: right;" value="Simpan">

                            </form>
                        </div>
                    </div>
                    <!--widget card ends-->


                </div>
            </div></div></div>
            <!-- =========== end row ========== -->
            
            <!-- ===========end row============== -->

        </div>
    </section>
    
    
<script type="text/javascript">
    window.onload = function () {
        document.getElementById("pw1").onchange = validatePassword;
        document.getElementById("pw2").onchange = validatePassword;
    }

    function validatePassword(){
    var pass2=document.getElementById("pw2").value;
    var pass1=document.getElementById("pw1").value;
    if(pass1!=pass2)
        document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
    else
        document.getElementById("pw2").setCustomValidity('');
    }
</script>                    