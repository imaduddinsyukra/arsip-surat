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
                $query = "INSERT into tbl_disposisi (id_disposisi, no_surat, kategori_surat, tujuan_disposisi, isi_disposisi, no_agenda, sifat, catatan, id_user, status_disposisi, created_at, updated_at) values ('$uuid','$no_surat','$kategori_surat','$tujuan_disposisi','$isi_disposisi','$no_agenda','$sifat','$catatan','$id_user','Menunggu Persetujuan','$created_at','$updated_at')";
            
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
        elseif($kode=='2'){
            $id_disposisi = $_POST['id_disposisi'];
            $kategori_surat = $_POST['kategori_surat'];
            $id_user_lanjutan = $_POST['id_user_lanjutan'];
            $surat_dari_lanjutan = $_POST['surat_dari_lanjutan'];
            $diterima_tgl_lanjutan = $_POST['diterima_tgl_lanjutan'];
            $sifat_lanjutan = $_POST['sifat_lanjutan'];
            $hal_lanjutan = $_POST['hal_lanjutan'];
            $diteruskan_lanjutan = $_POST['diteruskan_lanjutan'];
            $tindakan_lanjutan = $_POST['tindakan_lanjutan'];
            $batas_waktu_lanjutan = $_POST['batas_waktu_lanjutan'];
            $catatan_lanjutan = $_POST['catatan_lanjutan'];

            $total = count($diteruskan_lanjutan);
            $detail_surat = "";
            for($i=0; $i<$total; $i++){
                $detail_surat = $detail_surat.'{"nama":"'.$diteruskan_lanjutan[$i].'"}, ';
            }


            $set_detail = '['.$detail_surat.']';
            $detail_final = str_replace(", ]","]",$set_detail);

            //Buat konfigurasi upload
            //Folder tujuan upload file
            $eror		= false;
            $folder		= 'assets/files';
            //type file yang bisa diupload
            $file_type	= array('doc','docx','pdf','xls','xlsx');
            //tukuran maximum file yang dapat diupload
            $max_size	= 2000000; // 2MB
            if($tindakan=='0'){
                echo "
                <script>
                    alert('Tindakan Disposisi Wajib Diisi');
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
                $namabaru = "Surat_Disposisi_Lanjutan_".$ex_waktu.'.'.$extensi;
                $file = str_replace(" ","_","$namabaru");
                // $folder = $base_url."/assets/files/$file";
                $folder = "./assets/files/disposisi/$file";
                $folder_move = "./assets/files/disposisi/$file";
            
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
                        $query = "UPDATE tbl_disposisi SET 
                            surat_dari_lanjutan = '$surat_dari_lanjutan',
                            diterima_tgl_lanjutan = '$diterima_tgl_lanjutan',
                            sifat_lanjutan = '$sifat_lanjutan',
                            hal_lanjutan = '$hal_lanjutan',
                            diteruskan_lanjutan = '$detail_final',
                            tindakan_lanjutan = '$tindakan_lanjutan',
                            batas_waktu_lanjutan = '$batas_waktu_lanjutan',
                            catatan_lanjutan = '$catatan_lanjutan',
                            file_surat_lanjutan = '$folder',
                            status_disposisi = 'Disetujui',
                            updated_at = '$updated_at',
                            id_user_lanjutan = '$id_user_lanjutan'
                            WHERE id_disposisi = '$id_disposisi'";
                    
                        $hasil = mysql_query($query);
                        
                        
                        if ($hasil) { 
                        ?>
                            <script language="JavaScript">
                                var id_surat = "<?= $id_disposisi?>";
                                var kode = "1";
                                var kategori_surat = "<?= $kategori_surat?>";
                                alert("Data Berhasil di Disposisi");
                                document.location="./admin.php?part=detail-disposisi-lanjutan&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
                            </script>
                        <?php
                        }
                        else{
                        ?>
                            <script language="JavaScript">
                                var id_surat = "<?= $id_disposisi?>";
                                var kode = "1";
                                var kategori_surat = "<?= $kategori_surat?>";
                                alert("Surat Gagal di Disposisi");
                                document.location="./admin.php?part=detail-disposisi-lanjutan&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
                            </script>
                        <?php
                        }
                    } else{
                    ?>
                     <script language="JavaScript">
                        var id_surat = "<?= $id_disposisi?>";
                        var kode = "1";
                        var kategori_surat = "<?= $kategori_surat?>";
                        alert("Surat Gagal di Disposisi");
                        document.location="./admin.php?part=detail-disposisi-lanjutan&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
                    </script>
                    <?php
                    }
                }
            }

        }
        elseif($kode=='3'){
            $id_disposisi = $_POST['id_disposisi'];
            $catatan_lanjutan = $_POST['catatan_lanjutan'];
            $id_user_lanjutan = $_POST['id_user_lanjutan'];
            
            $query = "UPDATE tbl_disposisi SET 
                    catatan_lanjutan = '$catatan_lanjutan',
                    status_disposisi = 'Ditolak',
                    updated_at = '$updated_at',
                    id_user_lanjutan = '$id_user_lanjutan'
                    WHERE id_disposisi = '$id_disposisi'";
            
                $hasil = mysql_query($query);
                
                
                if ($hasil) { 
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_disposisi?>";
                        var kode = "1";
                        var kategori_surat = "<?= $kategori_surat?>";
                        alert("Data Disposisi Berhasil ditolak");
                        document.location="./admin.php?part=detail-disposisi-lanjutan&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
                    </script>
                <?php
                }
                else{
                ?>
                    <script language="JavaScript">
                        var id_surat = "<?= $id_disposisi?>";
                        var kode = "1";
                        var kategori_surat = "<?= $kategori_surat?>";
                        alert("Data Disposisi Gagal ditolak");
                        document.location="./admin.php?part=detail-disposisi-lanjutan&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
                    </script>
                <?php
                }
        }
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_disposisi = $_POST['id_disposisi'];
        $query = "UPDATE tbl_disposisi SET 
                no_surat = '$no_surat',
                tujuan_disposisi = '$tujuan_disposisi',
                isi_disposisi = '$isi_disposisi',
                no_agenda = '$no_agenda',
                sifat = '$sifat',
                catatan = '$catatan',
                id_user = '$id_user',
                updated_at = '$updated_at'
                WHERE id_disposisi = '$id_disposisi'";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
            <script language="JavaScript">
                var id_surat = "<?= $id_disposisi?>";
                var kode = "<?= $kode;?>";
                var kategori_surat = "<?= $kategori_surat?>";
                alert("Data Berhasil Diubah");
                document.location="./admin.php?part=detail-disposisi&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
            </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                var id_surat = "<?= $id_disposisi?>";
                var kode = "<?= $kode;?>";
                var kategori_surat = "<?= $kategori_surat?>";
                alert("Data Gagal Diubah");
                document.location="./admin.php?part=detail-disposisi&kategori_surat=" + kategori_surat + "&kode=" + kode + "&id_disposisi=" + id_surat
            </script>
        <?php
        }
    }
?>