<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $kode = $_POST['kd'];
    $id_surat = $_POST['id_surat'];
    $uuid = uniqid().'DsPsS'.rand();
    $no_surat = $_POST['no_surat'];
    $kategori_surat = $_POST['kategori_surat'];
    $tujuan_disposisi = $_POST['tujuan_disposisi'];
    $isi_disposisi = $_POST['isi_disposisi'];
    $no_agenda = $_POST['no_agenda'];
    $sifat = $_POST['sifat'];
    $catatan = $_POST['catatan'];
    $id_user = $_POST['id_user'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    
    
    if($_POST['parm']=='add_bos')
    {
        if($kode=='1'){
            if($sifat=='0'){
                echo "
                <script>
                    alert('Sifat Surat Wajib Diisi');
                    javascript: history.go(-1);
                </script>
                ";
            }
            else{
                $query = "INSERT into tbl_disposisi (id_disposisi, no_surat, kategori_surat, tujuan_disposisi, isi_disposisi, no_agenda, sifat, catatan, id_user, created_at, updated_at) values ('$uuid','$no_surat','$kategori_surat','$tujuan_disposisi','$isi_disposisi','$no_agenda','$sifat','$catatan','$id_user','$created_at','$updated_at')";
            
                $hasil = mysql_query($query);
        
                if ($hasil) { 
                    ?>
                        <script language="JavaScript">
                            var id_disposisi = "<?= $uuid?>";
                            var kategori_surat = "<?= $kategori_surat?>";
                            alert("Surat Berhasil di Disposisi");
                            document.location="./admin.php?part=detail-disposisi&kategori_surat="+ kategori_surat + "&kode=2&id_disposisi=" + id_disposisi
                        </script>
                    <?php
                }
                else{
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_surat?>";
                        var kategori_surat = "<?= $kategori_surat?>";
                        var kode = "<?= $kode?>";
                        alert("Surat Gagal di Disposisi");
                        document.location="./admin.php?part=tambah-disposisi&kategori_surat=" + kategori_surat + "&kode="+kode+"&id_surat="+id_surat
                    </script>
                <?php
                }
            }
        }
        else{
            $tindakan = $_POST['tindakan'];
            $batas_waktu = $_POST['batas_waktu'];

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
        
        if($file_name!=''){
            //check apakah type file sudah sesuai
            if(!in_array($extensi,$file_type)){
                $eror   = true;
                $pesan .= "Gagal Upload File - Format File Harus Document (.doc atau .docx)";
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
                            keterangan = '$keterangan',
                            file_surat = '$folder',
                            updated_at = '$updated_at',
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
                    keterangan = '$keterangan',
                    file_surat = '$gambar_lama',
                    updated_at = '$updated_at'
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