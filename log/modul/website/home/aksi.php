<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

    if($_POST['parm']=='add_bos')
    {
        
      $id_user = $_POST['id_user'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");
      $category_content= "Homepage";
      $status= "Aktif";
      
        //Buat konfigurasi upload
        //Folder tujuan upload file
        $eror		= false;
        //type file yang bisa diupload
        $file_type	= array('png','jpg','jpeg');
        //tukuran maximum file yang dapat diupload
        $max_size	= 2000000; // 2MB
        
        
        $nama_file	= $_FILES['data_upload']['tmp_name'];
    	$file_name	= $_FILES['data_upload']['name'];
		
    	$file_size	= $_FILES['data_upload']['size'];
    	//cari extensi file dengan menggunakan fungsi explode
    	$explode	= explode('.',$file_name);
    	$extensi	= $explode[count($explode)-1];
    	
    	$namabaru = "gallery_".$category_content.'_'.$tanggal_upload.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/content/homepage/$file";
    
    	//check apakah type file sudah sesuai
    	if(!in_array($extensi,$file_type)){
    		$eror   = true;
    		$pesan .= "The File Format Must Be PNG, JPG, JPEG";
    	}
    	if($file_size > $max_size){
    		$eror   = true;
    		$pesan .= " - File size exceeds the maximum limit 2mb";
    	}
    	//check ukuran file apakah sudah sesuai
    
    	if($eror == true){
    		echo "
    		    <script>
    		        alert('.$pesan.');
    		        javascript: history.go(-1);
                    location.reload(true);
    		      
    		    </script>
    		    ";
    	}
    	else{
            //mulai memproses upload file
            if(move_uploaded_file("$nama_file","$folder"))
            { 
                $query = "INSERT into image_content (category_content, foto, status, tanggal_upload, id_user) values ('$category_content','$folder','$status','$tanggal_upload','$id_user')" ;
                
                	$hasil = mysql_query($query);
                
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                        alert('Data Berhasil Ditambah');
                        document.location='./index2.php?part=page-home'</script>
                    " ;
                }
                else{
                    echo "
                        <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        javascript: history.go(-1);
                        location.reload(true);
                        </script>
                    " ;
                }
    		} else{
    			echo "
    			    <script language='JavaScript'>
                    alert('Data Gagal Ditambah');
                    javascript: history.go(-1);
                    location.reload(true);
                    </script>
    			" ;
    		}
    	}
   
//==============================================================================

    }
    elseif($_POST['parm']=='change_bos')
    {
        $id = $_POST['idnya'];
        $stat = $_POST['statusnya'];
        
        if($stat=="Aktif"){
            $status="Nonaktif";
        }
        elseif($stat=="Nonaktif"){
            $status="Aktif";
        }
        $hasil=mysql_query("UPDATE image_content SET 
                                status = '$status'
                                WHERE id_image = '$id'");
            
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Diupdate');
                document.location='./index2.php?part=page-home'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                    alert('Data Gagal Diupdate');
                    document.location='./index2.php?part=page-home'
                </script>
            " ;
        }

//==============================================================================
    }
    elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        $foto = $_POST['fotonya'];
        
        unlink("$foto");
        
        $query=mysql_query("DELETE from image_content where id_image='$id'");
        if($query){
            $_SESSION['id'] = "$id";
?>
            <script language="JavaScript">
            alert('Data Berhasil Dihapus');
            document.location='./index2.php?part=page-home'</script>
        <?php
        } else {
        ?>
            <script language="JavaScript">
            alert('Data Gagal Dihapus');
            document.location='./index2.php?part=page-home'</script>
<?php
        }
    }
?>