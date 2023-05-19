<?php

include 'koneksi.php';

$nisn               = $_POST['nisn'];
$nama_anggota       = $_POST['nama_anggota'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$no_telp_anggota    = $_POST['no_telp_anggota'];
$email_anggota      = $_POST['email_anggota'];
$alamat             = $_POST['alamat'];
$password           = md5($_POST['password']);

$sql    = "INSERT INTO anggota (nisn, nama_anggota, jenis_kelamin, no_telp_anggota, email_anggota, alamat, password) VALUES 
          ('$nisn', '$nama_anggota', '$jenis_kelamin', '$no_telp_anggota', '$email_anggota', '$alamat', '$password' )";

$hasil  = mysqli_query($conn, $sql);

if ($hasil) {
    echo '<script language="javascript">alert("Anda Berhasil Merdaftar! Silahkan login terlebih dahulu."); document.location="login.php"; </script>';
  }
else {
   if($nisn>0){
    echo '<script language="javascript">alert("NISN sudah terdaftar!"); document.location="login.php"; </script>';
   }
   else {
    echo '<script language="javascript">alert("Mohon maaf anda gagal mendaftar."); document.location="form_registrasi.php"; </script>';
   }
  } 

?>