<?php
$id = $_POST['idnya']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_berita join user where user.id_user = tbl_berita.pengirim_berita and id_berita = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b> Update News and Insight </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=kelola-berita"><font color="white">News and Insight</font></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><font color="white">Update </font>
                                </li>
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
                        <div class="card-header">
                            <h5 class="m-b-0">
                                Form Update News
                            </h5>
                           <!--  <p class="m-b-0 opacity-50">
                                Form control in dark backgrounds. use form-dark in parent container to make
                                inputs of the given container transparent
                            </p> -->
                        </div>
                        <div class="card-body ">
                            <!--Following uses  .form-dark class on parent to make controls appear -->
                            <!--transparent in the container-->
                            <form class="form-dark" action="index2.php?part=aksi-berita" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'];?>">
                            <input type="hidden" name="parm" value="update_bos">
                            <input type="hidden" name="news_id" required value="<?= $dt['id_berita'];?>">
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>News Tittle</label>
                                        <input type="text" class="form-control" placeholder="Input News Tittle" name="news_title" required value="<?= $dt['judul_berita'];?>">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>News Category</label>
                                        <select class="form-control" name="category" required>
                                            <option selected>---Select Category---</option>
                                            <option value="Culture" <?php if($dt['kategori_berita'] == 'Culture') { echo 'selected'; } ?>>Culture</option>
                                            <option value="Engagement" <?php if($dt['kategori_berita'] == 'Engagement') { echo 'selected'; } ?>>Engagement</option>
                                            <option value="Environment" <?php if($dt['kategori_berita'] == 'Environment') { echo 'selected'; } ?>>Environment</option>
                                            <option value="Finance" <?php if($dt['kategori_berita'] == 'Finance') { echo 'selected'; } ?>>Finance</option>
                                            <option value="Health" <?php if($dt['kategori_berita'] == 'Health') { echo 'selected'; } ?>>Health</option>
                                            <option value="Politic" <?php if($dt['kategori_berita'] == 'Politic') { echo 'selected'; } ?>>Politic</option>
                                            <option value="Sports" <?php if($dt['kategori_berita'] == 'Sports') { echo 'selected'; } ?>>Sports</option>
                                            <option value="Training" <?php if($dt['kategori_berita'] == 'Training') { echo 'selected'; } ?>>Training</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-row">
                                     <div class="form-group col-md-12">
                                        <label>Foto Thumbnail  <small><div class="strokeme">(*Max 2 mb)</div></b></small></label><br>
                                        <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="300"  data-default-file="<?= $dt['foto']; ?>"/>
                                        <input name="gambar_lama" type="hidden" value="<?= $dt['foto']; ?>"/>
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Descript News</label>
                                       <textarea placeholder="Input News Description" class="ckeditor" id="ckedtor" name="descript_news" required<?= $dt['isi_berita'];?></textarea>
                                    </div>
                                </div>
                                
                                 
                                
                               
                               
                                <input type="submit" class="btn btn-success" style="float: right;" value="Update">

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