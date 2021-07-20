<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b>News and Insight </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=kelola-berita"><font color="white">News and Insight</font></a></li>
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
                         <a href="index2.php?part=add-berita" type="button" class="btn btn-success"><font color="white">Add News</font></a>
                            <div class="table-responsive p-t-10">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Berita</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th width="200">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $no = 1;
                                    $query = mysql_query("SELECT * from tbl_berita join user where user.id_user = tbl_berita.pengirim_berita order by id_berita desc");
                                    while($dt = mysql_fetch_array($query)){
                                ?>   
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $dt['tanggal_berita'];?></td>
                                        <td><?= $dt['kategori_berita'];?></td>
                                        <td><?= $dt['judul_berita'];?></td>
                                        <td><?= $dt['nama'];?></td>
                                        
                                        <td> 
                                        <div class="row">
                                            <div class="col-md-4">
                                        <form action="index2.php?part=detail-berita" method="post">
                                            <input type="hidden" value="<?=$dt['id_berita'];?>" name="idnya">
                                            <input type="submit" class="btn btn-primary"value="Detail" style="width: 70px">
                                        </form>
                                            </div>
                                        
                                            <div class="col-md-4">
                                        <form action="index2.php?part=update-berita" method="post">
                                            <input type="hidden" value="<?=$dt['id_berita'];?>" name="idnya">
                                            <input type="submit" class="btn btn-warning"value="Edit" style="width: 70px">
                                        </form>
                                            </div>
                                        
                                            <div class="col-md-4">
                                        <form action="index2.php?part=aksi-berita" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                                            <input type="hidden" name="parm" value="delete_bos">
                                            <input type="hidden" value="<?=$dt['id_berita'];?>" name="idnya">
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