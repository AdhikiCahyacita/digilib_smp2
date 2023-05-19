<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nip']==""){
		header("location:../../petugas-login.php?pesan=gagal");
	}
 
?>

<?php

require ('lib/lib_kategori.php');
 
if(isset($_GET['id_kategori'])){
$Lib = new Library();
$user = $Lib->editKategori($_GET['id_kategori']);
$edit = $user->fetch(PDO::FETCH_OBJ);
echo '

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

<main role="main" class="col-md-auto ml-sm-auto col-lg-0 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Kategori</h1>
</div>    

      <form action="edit_kategori.php" method="POST">
        <input type="text" name="id_kategori" value="'.$edit->id_kategori.'" class="form-control" hidden>
        <div class="col-sm-2">
        Nama Kategori : 
        <br> <input type="text" name="nama_kategori" value="'.$edit->nama_kategori.'" class="form-control" required><br>
        <input type="submit" name="updateKategori" value="Update" class="btn btn-info">
        </div>

      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updateKategori'])){

  $id_kategori   = $_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];
   
  $Lib = new Library();
  $upd = $Lib->updateKategori($id_kategori, $nama_kategori);
 
}

  
?>