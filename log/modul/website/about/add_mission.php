<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b> Add Mission </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="#"><font color="white">Website</font></a></li>
                                <li class="breadcrumb-item"><a href="#"><font color="white">About</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=page-about-mission"><font color="white">Mission</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=add-about-mission"><font color="white">Add</font></a></li>
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
                            <form class="form-dark" action="index2.php?part=aksi-page-about" method="post">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'];?>">
                            <input type="hidden" name="parm" value="mission_item_bos">
                                
                                <div class="form-row">
                                     <div class="form-group col-md-12">
                                        <label>Mission</label><br>
                                        <input type="text" name='item' class="form-control" placeholder="Fill your mission" required/>
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