<?php
include "config/classDB.php";
if(isset($_POST['register'])){
    extract($_POST);
    $pass = password_hash($password,PASSWORD_DEFAULT);
    $ins = $dbo->insert("tbpelanggan","null,'$nama_pelanggan','$alamat','$no_hp','$username','$pass','1'");
    if($ins){
    ?> 
    <script>
        alert('register berhasil!! Silahkan login')
        location.href='login.php';
    </script>
    <?php
    }else{
        ?> 
    <script>
        alert('register gagal!! periksa data anda')
        location.href='register.php';
    </script>
    <?php

    }
}
?>