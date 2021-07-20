<?php
    // error_reporting(0);
    include "../../../config/koneksi.php";

    if($_POST['parm']=='add_bos')
    {
        
        
      $news_title = $_POST['news_title'];
      $category = $_POST['category'];
      $descript_news = $_POST['descript_news'];
      $id_user = $_POST['id_user'];

      date_default_timezone_set('Asia/Jakarta');
      $tgl_artikel = date("Y-m-d H:i:s");
      
        //Buat konfigurasi upload
        //Folder tujuan upload file
        $eror		= false;
        // $folder		= 'assets/img/news';
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
    	
    	$namabaru = "berita_".$category.'_'.$tgl_artikel.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/news/$file";
    
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
            
                $query = "INSERT into tbl_berita (kategori_berita, tanggal_berita, judul_berita, pengirim_berita, isi_berita, foto) values ('$category','$tgl_artikel','$news_title','$id_user','$descript_news','$folder')" ;
                
                	$hasil = mysql_query($query);
                
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                        alert('Data Berhasil Ditambah');
                        document.location='./index2.php?part=kelola-berita'</script>
                    " ;
                }
                else{
                    echo "
                        <script language='JavaScript'>
                        alert('Data Gagal Ditambah');
                        document.location='./index2.php?part=add-berita'</script>
                    " ;
                }
    		} else{
    			echo "
    			    <script language='JavaScript'>
                    alert('Data Gagal Ditambah');
                    document.location='./index2.php?part=add-berita'</script>
    			" ;
    		}
    	}
   
//==============================================================================

    }
    elseif($_POST['parm']=='update_bos')
    {
        
      $news_id = $_POST['news_id'];
      $news_title = $_POST['news_title'];
      $category = $_POST['category'];
      $descript_news = $_POST['descript_news'];
      $id_user = $_POST['id_user'];
      $gambar_lama = $_POST['gambar_lama'];

      date_default_timezone_set('Asia/Jakarta');
      $tgl_artikel = date("Y-m-d H:i:s");
      
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
    	
    	$namabaru = "berita_".$category.'_updatedimage_'.$tgl_artikel.'.'.$extensi;
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/news/$file";
    
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
        		        document.location='./index2.php?part=kelola-berita'
    		        </script>
        		    ";
        	}
        	else{
                //mulai memproses upload file
                if(move_uploaded_file("$nama_file","$folder"))
                { 
                    unlink("$gambar_lama");
                    
                    $query = "UPDATE tbl_berita SET 
                                judul_berita = '$news_title', 
                                pengirim_berita='$id_user',
                                isi_berita='$descript_news', 
                                kategori_berita='$category', 
                                foto='$folder' 
                                WHERE id_berita = '$news_id'";
                    
                    	$hasil = mysql_query($query);
                    
                    if ($hasil) { 
                        echo "
                            <script language='JavaScript'>
                                alert('Data Berhasil Diupdate');
                                document.location='./index2.php?part=kelola-berita'
                            </script>
                        " ;
                    }
                    else{
                        echo "
                            <script language='JavaScript'>
                                alert('Data Gagal Diupdate');
                                document.location='./index2.php?part=kelola-berita'
                            </script>
                        " ;
                    }
        		} else {
        			echo "
    			        <script language='JavaScript'>
                            alert('Data Gagal Diupdate');
                            document.location='./index2.php?part=kelola-berita'
                        </script>
        			" ;
        		}
        	}
        } else {
            $query = "UPDATE tbl_berita SET 
                            judul_berita = '$news_title', 
                            pengirim_berita='$id_user',
                            isi_berita='$descript_news', 
                            kategori_berita='$category', 
                            foto='$gambar_lama' 
                            WHERE id_berita = '$news_id'";
                
                	$hasil = mysql_query($query);
                
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                            alert('Data Berhasil Diupdate');
                            document.location='./index2.php?part=kelola-berita'
                        </script>
                    " ;
                }
                else{
                    echo "
                        <script language='JavaScript'>
                            alert('Data Gagal Diupdate');
                            document.location='./index2.php?part=kelola-berita'
                        </script>
                    " ;
                }
        }
   
//==============================================================================
    }
     elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        $foto = $_POST['fotonya'];
        
        unlink("$foto");
        
        $query=mysql_query("DELETE from tbl_berita where id_berita='$id'");
        if ($hasil) 
        { 
            echo "
                <script language='JavaScript'>
                alert('Data Berhasil Dihapus');
                document.location='./index2.php?part=kelola-berita'</script>
            " ;
        }
        else{
            echo "
                <script language='JavaScript'>
                    alert('Data Gagal Dihapus');
                    javascript: history.go(-1);
                    location.reload(true);
                </script>
            " ;
        }
    }
?>