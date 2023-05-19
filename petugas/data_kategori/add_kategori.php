<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nip']==""){
		header("location:../../petugas-login.php?pesan=gagal");
	}
 
?>

<main role="main" class="col-md-auto ml-sm-auto col-lg-12 ">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kategori</h1>
  </div>

<form action="add_kategori.php" method="POST">

<div class="form-group">
    <label> Nama Kategori:</label>
    <input type="text" name="nama_kategori" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" name="addKategori" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_user.php">Kembali</a>
</div>

<?php

include 'lib/lib_kategori.php';

if(isset($_POST['addKategori'])) {
    $nama_kategori  =   $_POST['nama_kategori'];

    $Lib    = new Library();
    $add    = $Lib->addKategori($nama_kategori);
    if($add == 'Success') {
        echo '<script language="javascript"> alert("Kategori Ditambahkan!"); document.location="data_kategori.php"; </script>';
    }
}

?>

</form>

</main>

</body>
</html>