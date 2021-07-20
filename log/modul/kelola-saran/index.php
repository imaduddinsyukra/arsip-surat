<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b>Data Kritik dan Saran </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=kelola-saran"><font color="white">Kritik dan Saran</font></a></li>
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

                            <div class="table-responsive p-t-10">
                                <table id="example" class="table   " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Perusahaan</th>
                                        <th>No. Telp</th>
                                        <th>Pesan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $no = 1;
                                    $query = mysql_query("select * from kritik_saran order by id_contact desc");
                                    while($dt = mysql_fetch_array($query)){
                                ?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $dt['tgl'];?></td>
                                        <td><?= $dt['nama'];?></td>
                                        <td><?= $dt['email'];?></td>
                                        <td><?= $dt['perusahaan'];?></td>
                                        <td><?= $dt['telpon'];?></td>
                                        <td><?= $dt['pesan'];?></td>
                                        
                                        <td>
                                            <form action="index2.php?part=hapus-saran" method="post" onClick="return confirm('Apakah Anda Yakin Hapus Data?')">
                                                <input type="hidden" name="parm" value="delete_bos">
                                                <input type="hidden" value="<?=$dt['id_contact'];?>" name="idnya">
                                                <input type="submit" class="btn btn-sm m-b-15 ml-2 mr-2 btn-danger"value="Hapus">
                                            </form>
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