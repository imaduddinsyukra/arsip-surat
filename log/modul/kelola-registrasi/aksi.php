<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

  
    if($_POST['parm']=='update_status_bos')
    {
        
      $id_regist = $_POST['id_regist'];
      $status_regist = $_POST['status_regist'];
      
      date_default_timezone_set('Asia/Jakarta');
      $status_regist_date = date("Y-m-d");
  
       $query = "UPDATE regist SET 
                    status_regist = '$status_regist', 
                    status_regist_date ='$status_regist_date'
                    WHERE id_regist = '$id_regist'";
        
        $hasil = mysql_query($query);
                    
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Diupdate');
                document.location='./index2.php?part=kelola-registrasi'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                    alert('Data Gagal Diupdate');
                    javascript: history.go(-1);
                    location.reload(true);
                </script>
            " ;
        }

    }
?>