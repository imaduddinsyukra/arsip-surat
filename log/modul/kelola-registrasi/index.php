<!--site header ends -->    
    <section class="admin-content">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-12 m-auto text-white">

                        <h1><font color="white"><b>Registrasi </b></font></h1>
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#"><font color="white">Home</font></a></li>
                                <li class="breadcrumb-item active"><a href="index2.php?part=kelola-registrasi"><font color="white">Registrasi</font></a></li>
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
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Nama Perusahaan</th>
                                        <th>PIC</th>
                                        <th>Kontak PIC</th>
                                        <th>Email PIC</th>
                                        <th>Status</th>
                                        <th width="200">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $no = 1;
                                    $query = mysql_query("SELECT * from regist order by id_regist desc");
                                    while($dt = mysql_fetch_array($query)){
                                ?>   
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $dt['regist_date'];?></td>
                                        <td><?= $dt['name_of_company'];?></td>
                                        <td><?= $dt['pic'];?></td>
                                        <td><?= $dt['pic_contact'];?></td>
                                        <td><?= $dt['pic_email'];?></td>
                                        <td><?= $dt['status_regist'];?></td>
                                        
                                        <td> 
                                        <div class="row">
                                            <div class="col-md-4">
                                        <form action="index2.php?part=detail-registrasi" method="post">
                                            <input type="hidden" value="<?=$dt['id_regist'];?>" name="idnya">
                                            <input type="submit" class="btn btn-primary"value="Detail" style="width: 70px">
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