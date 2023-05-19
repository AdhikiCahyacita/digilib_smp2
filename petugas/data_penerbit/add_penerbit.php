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

<form action="add_penerbit.php" method="POST">

<div class="form-group">
    <label> Nama Penerbit:</label>
    <input type="text" name="nama_penerbit" class="form-control" required>
</div>

<div class="form-group">
    <label> Alamat Penerbit:</label>
    <input type="text" name="alamat_penerbit" class="form-control" required>
</div>

<div class="form-group">
    <label> Nomor Telepon:</label>
    <input type="text" name="no_telp_penerbit" class="form-control" required>
</div>

<div class="form-group">
    <label> Email:</label>
    <input type="text" name="email_penerbit" class="form-control" required>
</div>



<div class="form-group">
    <input type="submit" name="addPenerbit" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_user.php">Kembali</a>
</div>

<?php

include 'lib/lib_penerbit.php';

if(isset($_POST['addPenerbit'])) {
    $nama_penerbit     =   $_POST['nama_penerbit'];
    $alamat_penerbit   =   $_POST['alamat_penerbit'];
    $no_telp_penerbit  =   $_POST['no_telp_penerbit'];
    $email_penerbit    =   $_POST['email_penerbit'];

    $Lib    = new Library();
    $add    = $Lib->addPenerbit($nama_penerbit, $alamat_penerbit, $no_telp_penerbit, $email_penerbit);
    if($add == 'Success') {
        echo '<script language="javascript"> alert("Penerbit Ditambahkan!"); document.location="data_penerbit.php"; </script>';
    }
}

?>

</form>

</main>

</body>
</html>