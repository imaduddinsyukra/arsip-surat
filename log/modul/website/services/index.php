<?php
$queryy2 = mysql_query("SELECT * FROM image_content where category_content = 'Services'"); //get the data that will be updated
$dt2=mysql_fetch_array($queryy2);
?>
<!--site header ends -->    

<section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b> Maritim Dua Satu Services</b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="#"><font color="white">Website</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=page-services"><font color="white">Services</font></a></li>
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
                            <form class="form-dark" action="index2.php?part=aksi-page-services" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'];?>">
                            <input type="hidden" name="parm" value="add_image_bos">
                                
                                <div class="form-row">
                                     <div class="form-group col-md-12">
                                        <label>Foto Thumbnail  <small><div class="strokeme">(*Max 2 mb)</div></b></small></label><br>
                                        <input type="file" name='data_upload' id="input-file-now-custom-2" class="dropify" data-height="300"  data-default-file="<?= $dt2['foto']; ?>"/>
                                        <input name="gambar_lama" type="hidden" value="<?= $dt2['foto']; ?>"/>
                                    </div>
                                </div>
                            
                                <input type="submit" class="btn btn-success" style="float: right;" value="Update">

                            </form>
                        </div>
                    </div>
                    <!--widget card ends-->
                    
                    <div class="card-body">
                         <a href="index2.php?part=add-services" type="button" class="btn btn-success"><font color="white">Add Services</font></a>
                            <div class="table-responsive p-t-10">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Services</th>
                                        <th>Description</th>
                                        <th width="200">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $no = 1;
                                    $query = mysql_query("SELECT * from content where category_content = 'Services'");
                                    while($dt = mysql_fetch_array($query)){
                                        $content = $dt['page_content'];
                                        $ex=explode('#',$content);
                                        $title=$ex[0];
                                        $description=$ex[1];
                                ?>   
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $title;?></td>
                                        <td><?= $description;?></td>
                                        
                                        <td> 
                                            <div class="col-md-4">
                                        <form action="index2.php?part=aksi-page-services" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                                            <input type="hidden" name="parm" value="delete_item_services_bos">
                                            <input type="hidden" value="<?=$dt['content_id'];?>" name="idnya">
                                            <input type="submit" class="btn btn-danger"value="Hapus" style="width: 70px">
                                        </form>
                                            </div>
                                            
                                        </div>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                </div>
            </div></div></div>
            <!-- =========== end row ========== -->
            
            <!-- ===========end row============== -->

        </div>
    </section>