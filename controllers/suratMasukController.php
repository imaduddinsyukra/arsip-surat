<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'SrTmSk'.rand();
    $pengirim = $_POST['pengirim'];
    $no_surat = $_POST['no_surat'];
    $tgl_surat = $_POST['tgl_surat'];
    $tgl_diterima = $_POST['tgl_diterima'];
    $keterangan = $_POST['keterangan'];
    $id_user = $_POST['id_user'];
    $id_jenis_surat = $_POST['id_jenis_surat'];
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
        if($id_jenis_surat=='0'){
            echo "
            <script>
                alert('Jenis Surat Wajib Diisi');
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
            $namabaru = "Surat_Masuk_".$pengirim.'_'.$ex_waktu.'.'.$extensi;
            $file = str_replace(" ","_","$namabaru");
            $folder = $base_url."/assets/files/$file";
            $folder_move = "./assets/files/$file";
        
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
                    $query = "INSERT into tbl_surat_masuk (id_surat_masuk, pengirim, no_surat, tgl_surat, tgl_diterima, id_jenis_surat, keterangan, id_user, file_surat, created_at, updated_at) values ('$uuid','$pengirim','$no_surat','$tgl_surat','$tgl_diterima','$id_jenis_surat','$keterangan','$id_user','$folder','$created_at','$updated_at')";
                    
                    $hasil = mysql_query($query);

                    if ($hasil) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Ditambah');
                            document.location='./admin.php?part=data-surat-masuk'</script>
                        " ;
                    }
                    else{
                        echo "
                            <script language='JavaScript'>
                            alert('Data Gagal Ditambah');
                            document.location='./admin.php?part=tambah-surat-masuk'</script>
                        " ;
                    }
                } else{
                    echo "
                        <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        document.location='./admin.php?part=tambah-surat-masuk'</script>
                    " ;
                }
    	    }
        }

//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $gambar_lama = $_POST['gambar_lama'];
        $id_surat_masuk = $_POST['id_surat_masuk'];

        //Mulai memorises data   
        $nama_file	= $_FILES['data_upload']['tmp_name'];
        $file_name	= $_FILES['data_upload']['name'];
        
        $file_size	= $_FILES['data_upload']['size'];
        //cari extensi file dengan menggunakan fungsi explode
        $explode	= explode('.',$file_name);
        $extensi	= $explode[count($explode)-1];
        $ex_waktu = str_replace(':','_', $updated_at);
        $namabaru = "Surat_Masuk_".$pengirim.'_Updated_at_'.$ex_waktu.'.'.$extensi;
        $file = str_replace(" ","_","$namabaru");
        $folder = $base_url."/assets/files/$file";
        $folder_move = "./assets/files/$file";
        
        $pesan="";
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
                    $query = "UPDATE tbl_surat_masuk SET 
                            pengirim = '$pengirim',
                            no_surat = '$no_surat',
                            tgl_surat = '$tgl_surat',
                            tgl_diterima = '$tgl_diterima',
                            id_jenis_surat = '$id_jenis_surat',
                            keterangan = '$keterangan',
                            file_surat = '$folder',
                            updated_at = '$updated_at',
                            id_user = '$id_user'
                            WHERE id_surat_masuk = '$id_surat_masuk'";
                    
                    $hasil = mysql_query($query);

                    if ($hasil) { 
                    ?>
                        <script language="JavaScript">
                            alert("Data Berhasil Diubah");
                            document.location="./admin.php?part=data-surat-masuk"
                        </script>
                    <?php
                    }
                    else{
                    ?>
                        <script language="JavaScript">
                            var id_surat = "<?= $id_surat_masuk?>";
                            alert("Data Gagal Diubah");
                            document.location="./admin.php?part=ubah-surat-masuk&id_surat_masuk=" + id_surat
                        </script>
                    <?php
                    }
                } else{
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_surat_masuk?>";
                        alert("Data Gagal Diubah");
                        document.location="./admin.php?part=ubah-surat-masuk&id_surat_masuk=" + id_surat
                    </script>
                <?php
                }
            }
        }
        else{
            $query = "UPDATE tbl_surat_masuk SET 
                    pengirim = '$pengirim',
                    no_surat = '$no_surat',
                    tgl_surat = '$tgl_surat',
                    tgl_diterima = '$tgl_diterima',
                    id_jenis_surat = '$id_jenis_surat',
                    keterangan = '$keterangan',
                    file_surat = '$gambar_lama',
                    updated_at = '$updated_at',
                    id_user = '$id_user'
                    WHERE id_surat_masuk = '$id_surat_masuk'";
            
            $hasil = mysql_query($query);

            if ($hasil) { 
            ?>
                    <script language="JavaScript">
                        alert("Data Berhasil Diubah");
                        document.location="./admin.php?part=data-surat-masuk"
                    </script>
            <?php
            }
            else{
            ?>
                <script language="JavaScript">
                    var id_surat = "<?= $id_surat_masuk?>";
                    alert("Data Gagal Diubah");
                    document.location="./admin.php?part=ubah-surat-masuk&id_surat_masuk=" + id_surat
                </script>
            <?php
            }
        }
    }
?>