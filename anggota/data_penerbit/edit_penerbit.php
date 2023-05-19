<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nip']==""){
		header("location:../../petugas-login.php?pesan=gagal");
	}
 
?>

<?php

require ('lib/lib_penerbit.php');
 
if(isset($_GET['id_penerbit'])){
$Lib = new Library();
$user = $Lib->editPenerbit($_GET['id_penerbit']);
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
  <h1 class="h2">Edit Data Penerbit</h1>
</div>    

      <form action="edit_penerbit.php" method="POST">
        <input type="text" name="id_penerbit" value="'.$edit->id_penerbit.'" class="form-control" hidden>
        
        <div class="col-sm-6">
        Nama Penerbit : 
        <br> <input type="text" name="nama_penerbit" value="'.$edit->nama_penerbit.'" class="form-control" required><br>
        
        Alamat Penerbit : 
        <br> <input type="text" name="alamat_penerbit" value="'.$edit->alamat_penerbit.'" class="form-control" required><br>

        Nomor Telepon : 
        <br> <input type="text" name="no_telp_penerbit" value="'.$edit->no_telp_penerbit.'" class="form-control" required><br>

        Email Penerbit: 
        <br> <input type="text" name="email_penerbit" value="'.$edit->email_penerbit.'" class="form-control" required><br>
        
        <input type="submit" name="updatePenerbit" value="Update" class="btn btn-info">
        </div>

      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updatePenerbit'])){

  $id_penerbit      = $_POST['id_penerbit'];
  $nama_penerbit    = $_POST['nama_penerbit'];
  $alamat_penerbit  = $_POST['alamat_penerbit'];
  $no_telp_penerbit = $_POST['no_telp_penerbit'];
  $email_penerbit   = $_POST['email_penerbit'];
   
  $Lib = new Library();
  $upd = $Lib->updatePenerbit($id_penerbit, $nama_penerbit, $alamat_penerbit, $no_telp_penerbit, $email_penerbit);
 
}

  
?>