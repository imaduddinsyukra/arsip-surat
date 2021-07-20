<?php
$queryy = mysql_query("SELECT * FROM content where category_content = 'History'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

$queryy2 = mysql_query("SELECT * FROM image_content where category_content = 'History'"); //get the data that will be updated
$dt2=mysql_fetch_array($queryy2);
?>
<!--site header ends -->    

<section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b>About History Maritim Dua Satu</b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="#"><font color="white">Website</font></a></li>
                                <li class="breadcrumb-item"><a href="#"><font color="white">About</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=page-about-history"><font color="white">History</font></a>
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
                        <div class="card-body ">
                            <!--Following uses  .form-dark class on parent to make controls appear -->
                            <!--transparent in the container-->
                            <form class="form-dark" action="index2.php?part=aksi-page-about" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'];?>">
                            <input type="hidden" name="parm" value="history_bos">
                            <input type="hidden" name="content_id" required value="<?= $dt['content_id'];?>">
                                
                                <div class="form-row">
                                     <div class="form-group col-md-12">
                                        <label>Foto Thumbnail  <small><div class="strokeme">(*Max 2 mb)</div></b></small></label><br>
                                        <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="300"  data-default-file="<?= $dt2['foto']; ?>"/>
                                        <input name="gambar_lama" type="hidden" value="<?= $dt2['foto']; ?>"/>
                                    </div>
                                </div>
                                
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>History</label>
                                       <textarea placeholder="Input News Description" class="ckeditor" id="ckedtor" name="page_content" required><?= $dt['page_content'];?></textarea>
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