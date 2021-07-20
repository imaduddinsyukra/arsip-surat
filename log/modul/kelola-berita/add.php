<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b> Add News and Insight </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=kelola-berita"><font color="white">News and Insight</font></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><font color="white">Add </font>
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
                                Form Add News
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
                            <input type="hidden" name="parm" value="add_bos">

                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>News Tittle</label>
                                        <input type="text" class="form-control" placeholder="Input News Tittle" name="news_title" required>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>News Category</label>
                                        <select class="form-control" name="category" required>
                                            <option selected>---Select Category---</option>
                                            <option value="Culture">Culture</option>
                                            <option value="Engagement">Engagement</option>
                                            <option value="Environment">Environment</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Health">Health</option>
                                            <option value="Politic">Politic</option>
                                            <option value="Sports">Sports</option>
                                            <option value="Training">Training</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-row">
                                     <div class="form-group col-md-12">
                                        <label>Foto Thumbnail <small><div class="strokeme">(*Max 2 mb)</div></b></small></label><br>
                                        <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="300" required="" />
                                    </div>
                                </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Descript News</label>
                                       <textarea placeholder="Input News Description" class="ckeditor" id="ckedtor" name="descript_news" required></textarea>
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