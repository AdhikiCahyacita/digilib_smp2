<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nip']==""){
		header("location:../../petugas-login.php?pesan=gagal");
	}
 
?>

<?php

require ('lib/lib_pengarang.php');
 
if(isset($_GET['id_pengarang'])){
$Lib = new Library();
$user = $Lib->editPengarang($_GET['id_pengarang']);
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
  <h1 class="h2">Edit Data Pengarang</h1>
</div>    

      <form action="edit_pengarang.php" method="POST">
        <input type="text" name="id_pengarang" value="'.$edit->id_pengarang.'" class="form-control" hidden>
        
        <div class="col-sm-6">
        Nama Pengarang : 
        <br> <input type="text" name="nama_pengarang" value="'.$edit->nama_pengarang.'" class="form-control" required><br>
        
        Nomor Telepon : 
        <br> <input type="text" name="no_telp_pengarang" value="'.$edit->no_telp_pengarang.'" class="form-control" required><br>

        Email Pengarang: 
        <br> <input type="text" name="email_pengarang" value="'.$edit->email_pengarang.'" class="form-control" required><br>
        
        <input type="submit" name="updatePengarang" value="Update" class="btn btn-info">
        </div>

      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updatePengarang'])){

  $id_pengarang      = $_POST['id_pengarang'];
  $nama_pengarang    = $_POST['nama_pengarang'];
  $no_telp_pengarang = $_POST['no_telp_pengarang'];
  $email_pengarang   = $_POST['email_pengarang'];
   
  $Lib = new Library();
  $upd = $Lib->updatePengarang($id_pengarang, $nama_pengarang, $no_telp_pengarang, $email_pengarang);
 
}

  
?>