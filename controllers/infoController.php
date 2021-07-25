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
            $query = "INSERT into tbl_info (id_info, judul_info, jenis_info, isi_info, id_user, keterangan, created_at, updated_at) values ('$uuid','$judul_info','$jenis_info','$isi_info','$id_user','$keterangan','$created_at','$updated_at')";
            
            $hasil = mysql_query($query);

            if ($hasil) { 
                echo "
                    <script language='JavaScript'>
                    alert('Data Berhasil Ditambah');
                    document.location='./admin.php?part=data-info'</script>
                " ;
            }
            else{
                // echo "
                //     <script language='JavaScript'>
                //     alert('Data Gagal Ditambah');
                //     document.location='./admin.php?part=data-info'</script>
                // " ;
                echo "
                    <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        javascript: history.go(-1);
                    </script>
                " ;
            }
        }
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_info = $_POST['id_info'];

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

            $query = "UPDATE tbl_info SET 
                    judul_info = '$judul_info',
                    jenis_info = '$jenis_info',
                    isi_info = '$isi_info',
                    id_user = '$id_user',
                    keterangan = '$keterangan',
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