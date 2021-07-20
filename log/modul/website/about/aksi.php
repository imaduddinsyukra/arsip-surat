<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

   
    if($_POST['parm']=='history_bos')
    {
        
      $id_user = $_POST['id_user'];
      $content_id = $_POST['content_id'];
      $page_content = $_POST['page_content'];
      $category_content = "History";
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
    	
    	$namabaru = "about_".$category_content.'_updatedimage_'.$tanggal_upload.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/content/about/$file";
    
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
                    	
                    $query2 = "UPDATE content SET 
                                page_content = '$page_content',
                                tanggal_upload='$tanggal_upload',
                                id_user = '$id_user'
                                WHERE content_id = '$content_id'";
                    
                    $hasil2 = mysql_query($query2);
                    
                    if ($hasil && $hasil2) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Diupdate');
                            document.location='./index2.php?part=page-about-history'</script>
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
                    	
                $query2 = "UPDATE content SET 
                                page_content = '$page_content',
                                tanggal_upload='$tanggal_upload',
                                id_user = '$id_user'
                                WHERE content_id = '$content_id'";
                    
                $hasil2 = mysql_query($query2);
                $hasil = mysql_query($query);
                
                if ($hasil && $hasil2) { 
                    echo "
                        <script language='JavaScript'>
                        alert('Data Berhasil Diupdate');
                        document.location='./index2.php?part=page-about-history'</script>
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
    elseif($_POST['parm']=='gallery_bos')
    {
        
      $id_user = $_POST['id_user'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");
      $category_content= "Gallery";
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
		$folder = "./assets/img/content/about/$file";
    
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
                        document.location='./index2.php?part=page-about-gallery'</script>
                    " ;
                }
                else{
                    echo "
                        <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        document.location='./index2.php?part=add-about-gallery'</script>
                    " ;
                }
    		} else{
    			echo "
    			    <script language='JavaScript'>
                    alert('Data Gagal Ditambah');
                    document.location='./index2.php?part=add-about-gallery'</script>
    			" ;
    		}
    	}
   
//==============================================================================
    }
    elseif($_POST['parm']=='change_gallery_bos')
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
                document.location='./index2.php?part=page-about-gallery'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                    alert('Data Gagal Diupdate');
                    document.location='./index2.php?part=page-about-gallery'
                </script>
            " ;
        }
        
//==============================================================================
    }
    else if($_POST['parm']=='delete_gallery_bos')
    {
        
      $id = $_POST['idnya'];
      $foto = $_POST['fotonya'];
        
        unlink("$foto");

        $query = "DELETE from image_content where id_image='$id'" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Dihapus');
                document.location='./index2.php?part=page-about-gallery'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Dihapus');
                document.location='./index2.php?part=page-about-gallery'</script>
            " ;
        }
      
      
//==============================================================================   
   
    }
    else if($_POST['parm']=='vision_bos')
    {
        
      $id_user = $_POST['id_user'];
      $content_id = $_POST['content_id'];
      $page_content = $_POST['page_content'];
      $category_content = "Vision";
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
		
		$namabaru = "about_".$category_content.'_updatedimage_'.$tanggal_upload.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/content/about/$file";
    
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
                    	
                    $query2 = "UPDATE content SET 
                                page_content = '$page_content',
                                tanggal_upload='$tanggal_upload',
                                id_user = '$id_user'
                                WHERE content_id = '$content_id'";
                    
                    $hasil2 = mysql_query($query2);
                    
                    if ($hasil && $hasil2) { 
                        echo "
                            <script language='JavaScript'>
                            alert('Data Berhasil Diupdate');
                            document.location='./index2.php?part=page-about-vision'</script>
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
                    	
                $query2 = "UPDATE content SET 
                                page_content = '$page_content',
                                tanggal_upload='$tanggal_upload',
                                id_user = '$id_user'
                                WHERE content_id = '$content_id'";
                    
                $hasil2 = mysql_query($query2);
                $hasil = mysql_query($query);
                
                if ($hasil && $hasil2) { 
                    echo "
                        <script language='JavaScript'>
                        alert('Data Berhasil Diupdate');
                        document.location='./index2.php?part=page-about-vision'</script>
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
    else if($_POST['parm']=='mission_image_bos')
    {
        
      $id_user = $_POST['id_user'];
      $category_content = "Mission";
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
    	
    	$namabaru = "about_".$category_content.'_updatedimage_'.$tanggal_upload.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/content/about/$file";
    
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
                            document.location='./index2.php?part=page-about-mission'</script>
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
                        document.location='./index2.php?part=page-about-mission'</script>
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
    else if($_POST['parm']=='mission_item_bos')
    {
        
      $id_user = $_POST['id_user'];
      $category_content = "Mission";
      $item = $_POST['item'];

      date_default_timezone_set('Asia/Jakarta');
      $tanggal_upload = date("Y-m-d H:i:s");

        $query = "INSERT into content (category_content, page_content, id_user, tanggal_upload) values ('$category_content','$item','$id_user','$tanggal_upload')" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Ditambah');
                document.location='./index2.php?part=page-about-mission'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Ditambah');
                document.location='./index2.php?part=add-about-mission'</script>
            " ;
        }
      
      
//==============================================================================
    }
    else if($_POST['parm']=='delete_item_mission_bos')
    {
        
      $id = $_POST['idnya'];

        $query = "DELETE from content where content_id='$id'" ;
                
        	$hasil = mysql_query($query);
        
        if ($hasil) { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Dihapus');
                document.location='./index2.php?part=page-about-mission'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                alert('Data Gagal Dihapus');
                document.location='./index2.php?part=page-about-mission'</script>
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