<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

   
    if($_POST['parm']=='add_image_bos')
    {
        
      $id_user = $_POST['id_user'];
      $category_content = "Services";
      $gambar_lama = $_POST['gambar_lama'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");
      
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
    	
		$namabaru = "services_".$category_content.'_updatedimage_'.$tanggal_upload.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/content/services/$file";
    
        if($file_name!=''){
            
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
                    
                    unlink("$gambar_lama");
                    $query = "UPDATE image_content SET 
                                tanggal_upload='$tanggal_upload',
                                foto='$folder' 
                                WHERE category_content = '$category_content'";
                    
                    $hasil = mysql_query($query);
                    	
                    if ($hasil) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Diupdate');
                            document.location='./index2.php?part=page-services'</script>
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
        		} else {
        			echo "
    			        <script language='JavaScript'>
                            alert('Data Gagal Diupdate');
                            javascript: history.go(-1);
                            location.reload(true);
                        </script>
        			" ;
        		}
        	}
        } else {
                $query = "UPDATE image_content SET 
                                tanggal_upload='$tanggal_upload',
                                foto='$gambar_lama' 
                                WHERE category_content = '$category_content'";
                    
                $hasil = mysql_query($query);
                
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                        alert('Data Berhasil Diupdate');
                        document.location='./index2.php?part=page-services'</script>
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
        
//==============================================================================

    }
    else if($_POST['parm']=='services_item_bos')
    {
        
      $id_user = $_POST['id_user'];
      $category_content = "Services";
      $item = $_POST['item'];
      $descript = $_POST['descript'];
      $fill = $item.'#'.$descript;

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");

        $query = "INSERT into content (category_content, page_content, id_user, tanggal_upload) values ('$category_content','$fill','$id_user','$tanggal_upload')" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Ditambah');
                document.location='./index2.php?part=page-services'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Ditambah');
                document.location='./index2.php?part=add-services'</script>
            " ;
        }
      
      
//==============================================================================
    }
    else if($_POST['parm']=='delete_item_services_bos')
    {
        
      $id = $_POST['idnya'];

        $query = "DELETE from content where content_id='$id'" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Dihapus');
                document.location='./index2.php?part=page-services'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Dihapus');
                document.location='./index2.php?part=page-services'</script>
            " ;
        }
      
      
//==============================================================================
    }
    else if($_POST['parm']=='add_image_why_bos')
    {
        
      $id_user = $_POST['id_user'];
      $category_content = "Why";
      $gambar_lama = $_POST['gambar_lama'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");
      
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
    	
		$namabaru = "services_".$category_content.'_updatedimage_'.$tanggal_upload.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/content/services/$file";
    
        if($file_name!=''){
            
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
                    
                    unlink("$gambar_lama");
                    $query = "UPDATE image_content SET 
                                tanggal_upload='$tanggal_upload',
                                foto='$folder' 
                                WHERE category_content = '$category_content'";
                    
                    $hasil = mysql_query($query);
                    	
                    if ($hasil) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Diupdate');
                            document.location='./index2.php?part=page-services-why'</script>
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
        		} else {
        			echo "
    			        <script language='JavaScript'>
                            alert('Data Gagal Diupdate');
                            javascript: history.go(-1);
                            location.reload(true);
                        </script>
        			" ;
        		}
        	}
        } else {
                $query = "UPDATE image_content SET 
                                tanggal_upload='$tanggal_upload',
                                foto='$gambar_lama' 
                                WHERE category_content = '$category_content'";
                    
                $hasil = mysql_query($query);
                
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                        alert('Data Berhasil Diupdate');
                        document.location='./index2.php?part=page-services-why'</script>
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
        
//==============================================================================

    }
    else if($_POST['parm']=='services_why_bos')
    {
        
      $id_user = $_POST['id_user'];
      $category_content = "Why";
      $item = $_POST['item'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");

        $query = "INSERT into content (category_content, page_content, id_user, tanggal_upload) values ('$category_content','$item','$id_user','$tanggal_upload')" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Ditambah');
                document.location='./index2.php?part=page-services-why'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Ditambah');
                document.location='./index2.php?part=add-services-why'</script>
            " ;
        }        
       
//==============================================================================
    }
    else if($_POST['parm']=='delete_item_why_bos')
    {
        
      $id = $_POST['idnya'];

        $query = "DELETE from content where content_id='$id'" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Dihapus');
                document.location='./index2.php?part=page-services-why'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Dihapus');
                document.location='./index2.php?part=page-services-why'</script>
            " ;
        }
      
              
//==============================================================================
    
    }
?>