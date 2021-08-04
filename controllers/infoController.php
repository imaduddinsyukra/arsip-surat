<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'InF'.rand();
    $judul_info = $_POST['judul_info'];
    $jenis_info = $_POST['jenis_info'];
    $isi_info = $_POST['isi_info'];
    $id_user = $_POST['id_user'];
    $keterangan = $_POST['keterangan'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    //Buat konfigurasi upload
    //Folder tujuan upload file
    $eror		= false;
    $folder		= 'assets/files';
    //type file yang bisa diupload
    $file_type	= array('doc','docx','pdf','xls','xlsx');
    //tukuran maximum file yang dapat diupload
    $max_size	= 2000000; // 2MB

    if($_POST['parm']=='add_bos')
    {
        if($jenis_info=='0'){
            echo "
            <script>
                alert('Jenis Info Wajib Diisi');
                javascript: history.go(-1);
            </script>
            ";
        }
        elseif($isi_info==''){
            echo "
            <script>
                alert('Isi Info Terlebih Dahulu');
                javascript: history.go(-1);
            </script>
            ";
        }
        else{
            //Mulai memorises data   
            $nama_file	= $_FILES['data_upload']['tmp_name'];
            $file_name	= $_FILES['data_upload']['name'];
            
            $file_size	= $_FILES['data_upload']['size'];
            //cari extensi file dengan menggunakan fungsi explode
            $explode	= explode('.',$file_name);
            $extensi	= $explode[count($explode)-1];
            $ex_waktu = str_replace(':','_', $updated_at);
            $namabaru = "Info_".$jenis_info.'_'.$ex_waktu.'.'.$extensi;
            $file = str_replace(" ","_","$namabaru");
            // $folder = $base_url."/assets/files/$file";
            $folder = "./assets/files/info/$file";
            $folder_move = "./assets/files/info/$file";
        
            //check apakah type file sudah sesuai
            if(!in_array($extensi,$file_type)){
                $eror   = true;
                $pesan .= "Gagal Upload File - Format File Harus .doc, .docx, .pdf, .xls, .xlsx";
            }
            if($file_size > $max_size){
                $eror   = true;
                $pesan .= " Gagal Upload File - Ukuran File Tidak Boleh Lebih Dari 2MB";
            }
            //check ukuran file apakah sudah sesuai
        
            if($eror == true){
                echo "
    		    <script>
    		        alert('.$pesan.');
    		        javascript: history.go(-1);
    		    </script>
    		    ";
            }
            else{
            // 	//mulai memproses upload file
                if(move_uploaded_file("$nama_file","$folder_move")){ // (Nama Asli File, Folder Tujuan)
                    //catat nama file ke database
                    $query = "INSERT into tbl_info (id_info, judul_info, jenis_info, isi_info, id_user, keterangan,  file_surat, created_at, updated_at) values ('$uuid','$judul_info','$jenis_info','$isi_info','$id_user','$keterangan','$folder','$created_at','$updated_at')";
                    
                    $hasil = mysql_query($query);

                    if ($hasil) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Ditambah');
                            document.location='./admin.php?part=data-info'</script>
                        " ;
                    }
                    else{
                        echo "
                            <script language='JavaScript'>
                                alert('Data Gagal Ditambah');
                                javascript: history.go(-1);
                            </script>
                        " ;
                    }
                } else{
                    echo "
                        <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        document.location='./admin.php?part=data-info'</script>
                    " ;
                }
            }
        }
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_info = $_POST['id_info'];
        $gambar_lama = $_POST['gambar_lama'];

        //Mulai memorises data   
        $nama_file	= $_FILES['data_upload']['tmp_name'];
        $file_name	= $_FILES['data_upload']['name'];
        
        $file_size	= $_FILES['data_upload']['size'];
        //cari extensi file dengan menggunakan fungsi explode
        $explode	= explode('.',$file_name);
        $extensi	= $explode[count($explode)-1];
        $ex_waktu = str_replace(':','_', $updated_at);
        $namabaru = "Info_".$jenis_info.'_Updated_at_'.$ex_waktu.'.'.$extensi;
        $file = str_replace(" ","_","$namabaru");
        // $folder = $base_url."/assets/files/$file";
        $folder = "./assets/files/info/$file";
        $folder_move = "./assets/files/info/$file";

        $pesan="";

        if($jenis_info=='0'){
        ?>
            <script language="JavaScript">
                var id_surat = "<?= $id_info?>";
                alert("Jenis Info Wajib Diisi");
                document.location="./admin.php?part=ubah-info&id_info=" + id_surat
            </script>
        <?php
        } elseif($isi_info==''){
        ?>
            <script language="JavaScript">
                var id_surat = "<?= $id_info?>";
                alert("Isi Info Terlebih Dahulu");
                document.location="./admin.php?part=ubah-info&id_info=" + id_surat
            </script>
        <?php
        } else{
            if($file_name!=''){
                //check apakah type file sudah sesuai
                if(!in_array($extensi,$file_type)){
                    $eror   = true;
                    $pesan .= "Gagal Upload File - Format File Harus .doc, .docx, .pdf, .xls, .xlsx";
                }
                if($file_size > $max_size){
                    $eror   = true;
                    $pesan .= " Gagal Upload File - Ukuran File Tidak Boleh Lebih Dari 2MB";
                }
                //check ukuran file apakah sudah sesuai
            
                if($eror == true){
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_surat_masuk?>";
                        var pesan = "<?= $pesan;?>";
                        alert(pesan);
                        document.location="./admin.php?part=ubah-surat-masuk&id_surat_masuk=" + id_surat
                    </script>
                <?php
                }
                else{
                // 	//mulai memproses upload file
                    if(move_uploaded_file("$nama_file","$folder_move")){ // (Nama Asli File, Folder Tujuan)
                        // Hapus File Lama
                        unlink("$gambar_lama");
                        //catat nama file ke database
                        $query = "UPDATE tbl_info SET 
                                judul_info = '$judul_info',
                                jenis_info = '$jenis_info',
                                isi_info = '$isi_info',
                                id_user = '$id_user',
                                keterangan = '$keterangan',
                                file_surat = '$folder',
                                updated_at = '$updated_at'
                                WHERE id_info = '$id_info'";
                        
                        $hasil = mysql_query($query);

                        if ($hasil) { 
                        ?>
                                <script language="JavaScript">
                                    alert("Data Berhasil Diubah");
                                    document.location="./admin.php?part=data-info"
                                </script>
                        <?php
                        }
                        else{
                        ?>
                            <script language="JavaScript">
                                var id_surat = "<?= $id_info?>";
                                alert("Data Gagal Diubah");
                                document.location="./admin.php?part=ubah-info&id_info=" + id_surat
                            </script>
                        <?php
                        }
                    } else{
                        ?>
                            <script language="JavaScript">
                                var id_surat = "<?= $id_info?>";
                                alert("Data Gagal Diubah");
                                document.location="./admin.php?part=ubah-info&id_info=" + id_surat
                            </script>
                        <?php
                    }
                }
            }
            else{
                $query = "UPDATE tbl_info SET 
                    judul_info = '$judul_info',
                    jenis_info = '$jenis_info',
                    isi_info = '$isi_info',
                    id_user = '$id_user',
                    keterangan = '$keterangan',
                    file_surat = '$gambar_lama',
                    updated_at = '$updated_at'
                    WHERE id_info = '$id_info'";
                
                $hasil = mysql_query($query);
    
                if ($hasil) { 
                ?>
                        <script language="JavaScript">
                            alert("Data Berhasil Diubah");
                            document.location="./admin.php?part=data-info"
                        </script>
                <?php
                }
                else{
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_info?>";
                            alert("Data Gagal Diubah");
                            document.location="./admin.php?part=ubah-info&id_info=" + id_surat
                    </script>
                <?php
                }
            }
        }

        
//==============================================================================
    }
        elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];

        $query = "DELETE from tbl_info where id_info='$id'";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Dihapus");
                    document.location="./admin.php?part=data-info"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Dihapus");
                document.location="./admin.php?part=data-info"
            </script>
        <?php
        }
    }
?>