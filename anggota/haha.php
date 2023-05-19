<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nisn']==""){
		header("location:../check-login.php?pesan=gagal");
	}
 
	?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profil</h1>
  </div>

<?php

include "../koneksi.php";

$nisn = $_SESSION['nisn'];

$q = mysqli_query($conn, "SELECT * FROM anggota WHERE nisn='$nisn'");

while($data=mysqli_fetch_array($q)){
echo ' 

<form action="profil.php" method="POST">

<div class="form-group">
    <label> NISN</label>
    <input type="text" name="nisn" class="form-control" value="'.$data['nisn'].'" readonly/>
</div>
			
<div class="form-group">
    <label> Nama:</label>
    <input type="text" name="nama_anggota" class="form-control" value="'.$data['nama_anggota'].'" readonly/>
</div>

<div class="form-group">
    <label> Jenis Kelamin:</label>
    <input type="text" name="jenis_kelamin" class="form-control" value="'.$data['jenis_kelamin'].'" readonly/>
</div>

<div class="form-group">
    <label> No. Telepon:</label>
    <input type="text" name="no_telp_anggota" class="form-control" value="'.$data['no_telp_anggota'].'" readonly/>
</div>

<div class="form-group">
    <label> Email:</label>
    <input type="text" name="email_anggota" class="form-control" value="'.$data['email_anggota'].'" readonly/>
</div>

<div class="form-group">
    <label> Alamat:</label>
    <input type="text" name="alamat" class="form-control" value="'.$data['alamat'].'" readonly/>
</div>

<div class="form-group">
<a class="btn btn-danger" href="../logout.php" target="frmMain"> Logout </a>
</div>

</form>
';

}
?>

</main>
</body>
</html>