<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'SrTrKmD'.rand();
    
    $no_surat = $_POST['no_surat'];
    $tgl_surat = $_POST['tgl_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $perihal = $_POST['perihal'];
    $sifat = $_POST['sifat'];
    $no_surat_lampiran = $_POST['no_surat_lampiran'];
    $tgl_surat_lampiran = $_POST['tgl_surat_lampiran'];
    $perihal_surat_lampiran = $_POST['perihal_surat_lampiran'];
    $nama_diajukan = $_POST['nama_diajukan'];
    $jabatan_diajukan = $_POST['jabatan_diajukan'];

    $id_user = $_POST['id_user'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    $total = count($nama_diajukan);
    $detail_surat = "";
    for($i=0; $i<$total; $i++){
        $detail_surat = $detail_surat.'{"nama":"'.$nama_diajukan[$i].'","jabatan":"'. $jabatan_diajukan[$i].'"}, ';
    }

    $set_detail = '['.$detail_surat.']';
    $detail_final = str_replace(", ]","]",$set_detail);

    $eror		= false;
    $folder		= 'assets/files';
    //type file yang bisa diupload
    $file_type	= array('doc','docx','pdf','xls','xlsx');
    //tukuran maximum file yang dapat diupload
    $max_size	= 2000000; // 2MB

    if($_POST['parm']=='add_bos')
    {
        if($sifat=='0'){
            echo "
            <script>
                alert('Sifat Surat Wajib Diisi');
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
            $namabaru = "Surat_Pengangkatan_".$tujuan_surat.'_'.$ex_waktu.'.'.$extensi;
            $file = str_replace(" ","_","$namabaru");
            // $folder = $base_url."/assets/files/$file";
            $folder = "./assets/files/surat-rekomendasi/$file";
            $folder_move = "./assets/files/surat-rekomendasi/$file";
        
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
                    $query = "INSERT into tbl_surat_rekomendasi_pengangkatan (id_surat_pengangkatan, no_surat, tgl_surat, sifat, perihal, tujuan_surat, detail_surat, no_surat_lampiran, tgl_surat_lampiran, perihal_surat_lampiran, file_surat, id_user,created_at, updated_at, keterangan) values ('$uuid','$no_surat','$tgl_surat','$sifat','$perihal','$tujuan_surat','$detail_final','$no_surat_lampiran','$tgl_surat_lampiran','$perihal_surat_lampiran','$folder','$id_user','$created_at','$updated_at','Aktif')";
                    
                    $hasil = mysql_query($query);

                    if ($hasil) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Ditambah');
                            document.location='./admin.php?part=data-surat-pengangkatan'</script>
                        " ;
                    }
                    else{
                        echo "
                            <script language='JavaScript'>
                            alert('Data Gagal Ditambah');
                            document.location='./admin.php?part=tambah-surat-pengangkatan'</script>
                        " ;
                    }
                } else{
                    echo "
                        <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        document.location='./admin.php?part=tambah-surat-pengangkatan'</script>
                    " ;
                }
    	    }
        }

//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $gambar_lama = $_POST['gambar_lama'];
        $id_surat_pengangkatan = $_POST['id_surat_pengangkatan'];

         //Mulai memorises data   
         $nama_file	= $_FILES['data_upload']['tmp_name'];
         $file_name	= $_FILES['data_upload']['name'];
         
         $file_size	= $_FILES['data_upload']['size'];
         //cari extensi file dengan menggunakan fungsi explode
         $explode	= explode('.',$file_name);
         $extensi	= $explode[count($explode)-1];
         $ex_waktu = str_replace(':','_', $updated_at);
         $namabaru = "Surat_Pengangkatan_".$tujuan_surat.'_Updated_at_'.$ex_waktu.'.'.$extensi;
         $file = str_replace(" ","_","$namabaru");
         // $folder = $base_url."/assets/files/$file";
         $folder = "./assets/files/surat-rekomendasi/$file";
         $folder_move = "./assets/files/surat-rekomendasi/$file";
    
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
                    var id_surat = "<?= $id_surat_pengangkatan?>";
                    var pesan = "<?= $pesan;?>";
                    alert(pesan);
                    document.location="./admin.php?part=ubah-surat-pengangkatan&id_surat_pengangkatan=" + id_surat
                </script>
            <?php
            }
            else{
            // 	//mulai memproses upload file
                if(move_uploaded_file("$nama_file","$folder_move")){ // (Nama Asli File, Folder Tujuan)
                    // Hapus File Lama
                    unlink("$gambar_lama");
                    //catat nama file ke database
                    $query = "UPDATE tbl_surat_rekomendasi_pengangkatan SET 
                            no_surat = '$no_surat',
                            tgl_surat = '$tgl_surat',
                            sifat = '$sifat',
                            perihal = '$perihal',
                            tujuan_surat = '$tujuan_surat',
                            detail_surat = '$detail_final',
                            no_surat_lampiran = '$no_surat_lampiran',
                            tgl_surat_lampiran = '$tgl_surat_lampiran',
                            perihal_surat_lampiran = '$perihal_surat_lampiran',
                            file_surat = '$folder',
                            id_user = '$id_user',
                            updated_at = '$updated_at'
                            WHERE id_surat_pengangkatan = '$id_surat_pengangkatan'";
            
                    $hasil = mysql_query($query);

                    if ($hasil) { 
                    ?>
                        <script language="JavaScript">
                            alert("Data Berhasil Diubah");
                            document.location="./admin.php?part=data-surat-pengangkatan"
                        </script>
                    <?php
                    }
                    else{
                    ?>
                        <script language="JavaScript">
                            var id_surat = "<?= $id_surat_pengangkatan?>";
                            alert("Data Gagal Diubah");
                            document.location="./admin.php?part=ubah-surat-pengangkatan&id_surat_pengangkatan=" + id_surat
                        </script>
                    <?php
                    }
                } else{
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_surat_pengangkatan?>";
                        alert("Data Gagal Diubah");
                        document.location="./admin.php?part=ubah-surat-pengangkatan&id_surat_pengangkatan=" + id_surat
                    </script>
                <?php
                }
            }
        }
        else{
            $query = "UPDATE tbl_surat_rekomendasi_pengangkatan SET 
                    no_surat = '$no_surat',
                    tgl_surat = '$tgl_surat',
                    sifat = '$sifat',
                    perihal = '$perihal',
                    tujuan_surat = '$tujuan_surat',
                    detail_surat = '$detail_final',
                    no_surat_lampiran = '$no_surat_lampiran',
                    tgl_surat_lampiran = '$tgl_surat_lampiran',
                    perihal_surat_lampiran = '$perihal_surat_lampiran',
                    file_surat = '$gambar_lama',
                    id_user = '$id_user',
                    updated_at = '$updated_at'
                    WHERE id_surat_pengangkatan = '$id_surat_pengangkatan'";
            
            $hasil = mysql_query($query);

            if ($hasil) { 
            ?>
                    <script language="JavaScript">
                        alert("Data Berhasil Diubah");
                        document.location="./admin.php?part=data-surat-pengangkatan"
                    </script>
            <?php
            }
            else{
            ?>
                <script language="JavaScript">
                    var id_surat = "<?= $id_surat_pengangkatan?>";
                    alert("Data Gagal Diubah");
                    document.location="./admin.php?part=ubah-surat-pengangkatan&id_surat_pengangkatan=" + id_surat
                </script>
            <?php
            }
        }
          
    //==============================================================================
    }
        elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        $id_user = $_POST['id_user'];

        $query = "UPDATE tbl_surat_rekomendasi_pengangkatan SET 
                keterangan = 'Tidak Aktif',
                id_user = '$id_user',
                updated_at = '$updated_at'
                WHERE id_surat_pengangkatan = '$id'";

        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Dihapus");
                    document.location="./admin.php?part=data-surat-pengangkatan"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Dihapus");
                document.location="./admin.php?part=data-surat-pengangkatan"
            </script>
        <?php
        }
    }
?>