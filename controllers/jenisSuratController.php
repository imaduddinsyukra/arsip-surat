<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'JnSsRt'.rand();
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    if($_POST['parm']=='add_bos')
    {
        $jenis_surat = $_POST['jenis_surat'];
        
        $query = "INSERT into tbl_jenis_surat (id_jenis_surat, jenis_surat, keterangan, created_at, updated_at) values ('$uuid','$jenis_surat','Aktif','$created_at','$updated_at')";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Ditambah');
                document.location='./admin.php?part=data-jenis-surat'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Ditambah');
                document.location='./admin.php?part=data-jenis-surat'</script>
            " ;
        }
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_jenis_surat = $_POST['id_jenis_surat'];
        $jenis_surat = $_POST['jenis_surat'];

        $query = "UPDATE tbl_jenis_surat SET 
                jenis_surat = '$jenis_surat',
                updated_at = '$updated_at'
                WHERE id_jenis_surat = '$id_jenis_surat'";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Diubah");
                    document.location="./admin.php?part=data-jenis-surat"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Diubah");
                document.location="./admin.php?part=data-jenis-surat"
            </script>
        <?php
        }

        
//==============================================================================
    }
        elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        
        $query = "UPDATE tbl_jenis_surat SET 
                keterangan = 'Tidak Aktif',
                updated_at = '$updated_at'
                WHERE id_jenis_surat = '$id'";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Dihapus");
                    document.location="./admin.php?part=data-jenis-surat"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Dihapus");
                document.location="./admin.php?part=data-jenis-surat"
            </script>
        <?php
        }
    }
?>