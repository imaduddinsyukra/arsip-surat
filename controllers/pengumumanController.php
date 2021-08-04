<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'pGgM'.rand();
    $id_user = $_POST['id_user'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    if($_POST['parm']=='add_bos')
    {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        
        if($isi==''){
            echo "
            <script>
                alert('Isi Pengumuman Wajib Diisi');
                javascript: history.go(-1);
            </script>
            ";
        }
        else{
            $query = "INSERT into tbl_pengumuman (id_pengumuman, judul, isi, id_user, created_at, updated_at) values ('$uuid','$judul','$isi','$id_user','$created_at','$updated_at')";
            
            $hasil = mysql_query($query);
    
            if ($hasil) { 
                echo "
                    <script language='JavaScript'>
                    alert('Data Berhasil Ditambah');
                    document.location='./admin.php?part=data-pengumuman'</script>
                " ;
            }
            else{
                echo "
                    <script language='JavaScript'>
                    alert('Data Gagal Ditambah');
                    document.location='./admin.php?part=data-pengumuman'</script>
                " ;
            }
        }
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_pengumuman = $_POST['id_pengumuman'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        
        if($isi==''){
            echo "
            <script>
                alert('Isi Pengumuman Wajib Diisi');
                javascript: history.go(-1);
            </script>
            ";
        }
        else{
            $query = "UPDATE tbl_pengumuman SET 
                    judul = '$judul',
                    isi = '$isi',
                    id_user = '$id_user',
                    updated_at = '$updated_at'
                    WHERE id_pengumuman = '$id_pengumuman'";
            
            $hasil = mysql_query($query);

            if ($hasil) { 
            ?>
                    <script language="JavaScript">
                        alert("Data Berhasil Diubah");
                        document.location="./admin.php?part=data-pengumuman"
                    </script>
            <?php
            }
            else{
            ?>
                <script language="JavaScript">
                    alert("Data Gagal Diubah");
                    document.location="./admin.php?part=data-pengumuman"
                </script>
            <?php
            }
        }

        
//==============================================================================
    }
        elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        
        $query = "DELETE from tbl_pengumuman where id_pengumuman='$id'";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Dihapus");
                    document.location="./admin.php?part=data-pengumuman"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Dihapus");
                document.location="./admin.php?part=data-pengumuman"
            </script>
        <?php
        }
    }
?>