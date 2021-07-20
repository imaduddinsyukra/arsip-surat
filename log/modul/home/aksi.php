<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

    if($_POST['parm']=='update_password_bos')
    {
        
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $password_lama = $_POST['password_lama'];
        $current_password = md5($_POST['current_password']);
        
        if($password_lama === $current_password){
            if($_POST['password']!=""){
                 $query = "UPDATE user SET 
                        username = '$username', 
                        password = '$password'
                        WHERE id_user= '$id_user'";
            
            	$hasil = mysql_query($query);
                            
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                            alert('Data Berhasil Diubah, Silahkan Login Kembali Untuk Melanjutkan');
                            document.location='../assets/conn/logout.php'
                        </script>
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
            else{
                $query = "UPDATE user SET 
                        username = '$username', 
                        password = '$password_lama'
                        WHERE id_user= '$id_user'";
            
            	$hasil = mysql_query($query);
                            
                if ($hasil) { 
                    echo "
                        <script language='JavaScript'>
                            alert('Data Berhasil Diubah');
                            document.location='./index2.php?part=profil'
                        </script>
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
        }
        else{
            echo "
                <script language='JavaScript'>
                    alert('Password Saat Ini yang Anda Inputkan Tidak Sesuai');
                    javascript: history.go(-1);
                    location.reload(true);
                </script>
            " ;
        }
  
    }
?>