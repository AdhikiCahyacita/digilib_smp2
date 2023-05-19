<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nip']==""){
		header("location:../../petugas-login.php?pesan=gagal");
	}
 
?>

<?php

require ('lib/lib_anggota.php');
 
if(isset($_GET['id_anggota'])){
$Lib = new Library();
$user = $Lib->editAnggota($_GET['id_anggota']);
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

      <form action="edit_anggota.php" method="POST">
        <input type="text" name="id_anggota" value="'.$edit->id_anggota.'" class="form-control" hidden>
        <div class="col-sm-2">
        NISN : 
        <br> <input type="text" name="nisn" value="'.$edit->nisn.'" class="form-control" required><br>

        Nama Anggota : 
        <br> <input type="text" name="nama_anggota" value="'.$edit->nama_anggota.'" class="form-control" required><br>

        Jenis Kelamin : 
        <br>
        
        <input type="radio" class="form-control" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
        <input type="radio" class="form-control" name="jenis_kelamin" value="Perempuan" required> Perempuan
        <br>

        Nomor telepon : 
        <br> <input type="text" name="no_telp_anggota" value="'.$edit->no_telp_anggota.'" class="form-control" required><br>

        Email Anggota : 
        <br> <input type="email" name="email_anggota" value="'.$edit->email_anggota.'" class="form-control" required><br>

        Alamat : 
        <br> <input type="text" name="nama_kategori" value="'.$edit->alamat.'" class="form-control" required><br>

        <input type="submit" name="updateAnggota" value="Update" class="btn btn-info">
        </div>

      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updateAnggota'])){

  $id_anggota       = $_POST['id_anggota'];
  $nisn             = $_POST['nisn'];
  $nama_anggota     = $_POST['nama_anggota'];
  $jenis_kelamin    = $_POST['jenis_kelamin'];
  $no_telp_anggota  = $_POST['no_telp_anggota'];
  $email_anggota    = $_POST['email_anggota'];
  $alamat           = $_POST['alamat'];
   
  $Lib = new Library();
  $upd = $Lib->updateAnggota($id_anggota, $nisn, $nama_anggota, $jenis_kelamin, $no_telp_anggota, $email_anggota, $alamat);
 
}

  
?>