<?php
$id = $_POST['idnya']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM regist where id_regist = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b> Detail Registrasi </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=kelola-registrasi"><font color="white">Registrasi</font></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><font color="white">Detail </font>
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
                            <div class="card-controls">
                                <a href="javascript:history.back()" type="button" class="btn btn-success"><font color="white"> <i class="icon-placeholder mdi mdi-arrow-left "></i> Kembali</font></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" value="<?= $dt['name_of_company'];?>" disabled>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Company's Registration Form</label>
                                    <a href="../../<?= $dt['regist_form'];?>" type="button" class="btn btn-success" target="blank" style="width:510px"><font color="white"> <i class="icon-placeholder mdi mdi-download "></i> Download Form</font></a>
                                </div>
                            </div>
                                
                                
                            <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <label>Company's Address</label>
                                    <input type="text" class="form-control" value="<?= $dt['address_of_company'];?>" disabled>
                                </div>
                            </div>
                            <hr>
<!--============================================================= -->
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>PIC</label>
                                    <input type="text" class="form-control" value="<?= $dt['pic'];?>" disabled>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>PIC Contact</label>
                                    <input type="text" class="form-control" value="<?= $dt['pic_contact'];?>" disabled>
                                </div>
                            </div>
                                
                                
                            <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <label>PIC Email</label>
                                    <input type="text" class="form-control" value="<?= $dt['pic_email'];?>" disabled>
                                </div>
                            </div>
                            <hr>   
<!--============================================================= -->  
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Vessel Name</label>
                                    <input type="text" class="form-control" value="<?= $dt['name_of_vessel'];?>" disabled>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Vesel Flag</label>
                                    <input type="text" class="form-control" value="<?= $dt['flag_of_vessel'];?>" disabled>
                                </div>
                            </div>
                                
                                
                            <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <label>Vessel Identification Number (IMO)</label>
                                    <input type="text" class="form-control" value="<?= $dt['imo_of_vessel'];?>" disabled>
                                </div>
                            </div>
<!--============================================================= --> 
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>Port Entry Date and Time</label>
                                    <input type="text" class="form-control" value="<?= $dt['port_entry_date'];?>" disabled>
                            </div>
                                <div class="form-group  col-md-6">
                                    <label>&nbsp;</label>
                                    <input type="text" class="form-control" value="<?= $dt['port_entry_time'];?>" disabled>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>The number of security personnel required</label>
                                    <input type="text" class="form-control" value="<?= $dt['number_of_personal'];?> personel" disabled>
                            </div>
                                <div class="form-group  col-md-6">
                                    <label>Number of days (Estimated)</label>
                                    <input type="text" class="form-control" value="<?= $dt['estimate_day'];?> days" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-md-12">
                                    <label>Port Location</label>
                                    <input type="text" class="form-control" value="Dumai" disabled>
                                </div>
                            </div>
                            <hr>   
<!--============================================================= --> 
                            <form class="form-dark" action="index2.php?part=aksi-registrasi" method="post">
                                <input type="hidden" name="parm" value="update_status_bos">
                                <input type="hidden" class="form-control" value="<?= $id;?>" name="id_regist">
                            <div class="form-row">
                                <div class="form-group  col-md-12">
                                    <label>Status Registration</label>
                                    <select name="status_regist" class="form-control">
                                        <option value="Submission" <?php if($dt['status_regist'] == 'Submission') { echo 'selected'; } ?>>Submission</option> 
                                        <option value="Accepted" <?php if($dt['status_regist'] == 'Accepted') { echo 'selected'; } ?>>Accepted</option>
                                        <option value="Rejected" <?php if($dt['status_regist'] == 'Rejected') { echo 'selected'; } ?>>Rejected</option>
                                    </select>
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