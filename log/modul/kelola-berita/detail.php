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

                        <h1><font color="white"><b> Detail News </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item"><a href="index2.php?part=kelola-berita"><font color="white">News and Insight</font></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><font color="white">Detail </font>
                                </li>
                            </ol>
                        </nav>

                    </div>


                </div>
            </div>
        </div>
        
        
        <div class="container pull-up">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Single post-->
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="media">
                                <div class="avatar mr-3 my-auto  avatar-xs">
                                    <img src="assets/img/users/user-4.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <div class="media-body m-auto">
                                    <h5 class="m-0"> <?= $dt['nama'];?> </h5>
                                    <div class="opacity-75 text-muted"><?= $dt['tanggal_berita'];?></div>
                                </div>
                            </div>
                            
                            <div class="card-controls">
                                <a href="javascript:history.back()" type="button" class="btn btn-success"><font color="white"> <i class="icon-placeholder mdi mdi-arrow-left "></i> Kembali</font></a>
                            </div>

                        </div>
                        <div class="card-raw">


                        </div>
                        <div class="card-body">
                            <div class="p-b-10 text-center">
                                <h2><b><?= $dt['judul_berita'];?></b></h2>
                                <br>
                                <img class="rounded" src="<?= $dt['foto'];?>" alt="">
                            </div>
                            <p>
                                <?= $dt['isi_berita'];?>
                            </p>


                            <br><br><hr>
                            <div class="row">
                                <div class="col">
                                    <div class="opacity-75">
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <b>Category: </b>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-warning"><?= $dt['kategori_berita'];?></span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>