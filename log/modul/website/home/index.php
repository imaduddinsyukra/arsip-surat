<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>



<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b>Home page Website </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=kelola-berita"><font color="white">Website</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=page-home"><font color="white">Homepage</font></a></li>
                                </li>
                            </ol>
                        </nav>

                    </div>


                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                         <a href="index2.php?part=add-page-home" type="button" class="btn btn-success"><font color="white">Add Gallery</font></a>
                            <div class="table-responsive p-t-10">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gallery</th>
                                        <th>Status</th>
                                        <th width="200">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $no = 1;
                                    $query = mysql_query("SELECT * from image_content where category_content='Homepage' order by id_image desc");
                                    while($dt = mysql_fetch_array($query)){
                                ?>   
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td>
                                            <a class="fancybox" rel="group" href="<?= $dt['foto'];?>"><img src="<?= $dt['foto'];?>" alt="" style="width: 310px; height: 190px"/></a>
                                          
                                        </td>
                                        <td>
                                            
                                            <form action="index2.php?part=aksi-page-home" method="post"  onClick="return confirm('Apakah Anda Yakin Mengganti Status?')">
                                            <input type="hidden" value="change_bos" name="parm">
                                            <input type="hidden" value="<?=$dt['id_image'];?>" name="idnya">
                                            <input type="hidden" value="<?=$dt['status'];?>" name="statusnya">
                                            
                                            <?php if($dt['status']=='Aktif'){ ?>
                                            <input type="submit" class="btn btn-success"value="<?= $dt['status'];?>" style="width: 70px">
                                            <?php } elseif($dt['status']=='Nonaktif') { ?>
                                            <input type="submit" class="btn btn-danger" value="<?= $dt['status'];?>" style="width: 100px">
                                            <?php } ?>
                                        </form>
                                        </td>

                                        <td> 
                                        <div class="row">
                                        
                                            <div class="col-md-4">
                                        <form action="index2.php?part=aksi-page-home" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                                            <input type="hidden" name="parm" value="delete_bos">
                                            <input type="hidden" value="<?=$dt['id_image'];?>" name="idnya">
                                            <input type="hidden" value="<?=$dt['foto'];?>" name="fotonya">
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
                </div>
            </div>
        </div>
    </section>
    
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>