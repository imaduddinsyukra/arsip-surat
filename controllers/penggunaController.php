<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'uS3r'.rand();
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    if($_POST['parm']=='add_bos')
    {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];
        
        if($level=='0'){
            echo "
            <script>
                alert('Level Pengguna Wajib Diisi');
                javascript: history.go(-1);
            </script>
            ";
        }
        else{
            $query = "INSERT into tbl_user (id_user, nama, username, password, level, status, created_at, updated_at) values ('$uuid','$nama','$username','$password','$level','1','$created_at','$updated_at')";
        
            $hasil = mysql_query($query);
    
            if ($hasil) { 
                echo "
                    <script language='JavaScript'>
                    alert('Data Berhasil Ditambah');
                    document.location='./admin.php?part=data-pengguna'</script>
                " ;
            }
            else{
                echo "
                    <script language='JavaScript'>
                    alert('Data Gagal Ditambah');
                    document.location='./admin.php?part=data-pengguna'</script>
                " ;
            }
        }
        
        
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $level = $_POST['level'];
        if($_POST['password']==""){
            $query = "UPDATE tbl_user SET 
                nama = '$nama',
                username = '$username',
                level = '$level',
                updated_at = '$updated_at'
                WHERE id_user = '$id_user'";
        }
        else{
            $password = md5($_POST['password']);
            $query = "UPDATE tbl_user SET 
                nama = '$nama',
                username = '$username',
                password = '$password',
                level = '$level',
                updated_at = '$updated_at'
                WHERE id_user = '$id_user'";
        }
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Diubah");
                    document.location="./admin.php?part=data-pengguna"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Diubah");
                document.location="./admin.php?part=data-pengguna"
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