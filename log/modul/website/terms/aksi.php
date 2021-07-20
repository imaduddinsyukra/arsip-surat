<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

   
   if($_POST['parm']=='update_terms_bos')
    {
        
      $content_id = $_POST['content_id'];
      $page_content = $_POST['page_content'];
      $id_user = $_POST['id_user'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");
      
    
        $query = "UPDATE content SET 
                    page_content = '$page_content', 
                    id_user='$id_user',
                    tanggal_upload='$tanggal_upload'
                    WHERE content_id = '$content_id'";
        
        $hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Diupdate');
                document.location='./index2.php?part=page-terms'</script>
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
        	
//==============================================================================
    
    }
?>