<?php
    session_start();

    include 'koneksi.php';

    $nisn       = $_POST['nisn'];
    $password   = md5($_POST['password']);

    //seleksi data login brow

    $login          = mysqli_query($conn,"SELECT * FROM anggota WHERE nisn='$nisn' AND password='$password' ");

    //hitung jumlah data yang ditemukan

    $check          = mysqli_num_rows($login);

    //cek di database

    // if(!preg_match("/^[a-zA-Z0-9]*$/", $nisn)){
    //     echo '<script language="javascript">alert("Anda berhasil login!"); document.location="https://www.hukumonline.com/klinik/detail/cl5960/landasan-hukum-penanganan-cybercrime-di-indonesia/"; </script>';;
    // }

    if($check>0) {

        $data = mysqli_fetch_assoc($login);
            // buat session login dan username
            $_SESSION['nisn'] = $nisn;
            // alihkan ke halaman dashboard admin
            echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="anggota/index.php"; </script>';
     
        // cek jika user login sebagai panitia
        }
        	
        else{
        echo '<script language="javascript">alert("Username atau password salah!"); document.location="login.php"; </script>';
        }
     
    ?>