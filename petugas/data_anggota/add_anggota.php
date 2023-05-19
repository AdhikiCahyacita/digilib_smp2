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
    <h1 class="h2">Tambah Anggota</h1>
  </div>

    <form action="add_anggota.php" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control" name="nisn" onkeypress="return number(event)" placeholder="NISN" required>
                </div>                

                <div class="form-group">
                    <input type="text" class="form-control" name="nama_anggota" placeholder="Nama" required>
                </div>

                <div class="form-group">
                    <table>
                     <tr rowspan="2">
                     <label> Jenis Kelamin </label> 
                      <td> <input type="radio" class="form-control" name="jenis_kelamin" value="Laki-laki" required> <p> Laki-laki </p> </td>
                      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                      <td> <input type="radio" class="form-control" name="jenis_kelamin" value="Perempuan" required> <p> Perempuan </p> </td>
                     </tr>
                    </table>    
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="no_telp_anggota" onkeypress="return number(event)" placeholder="Nomor Telepon" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email_anggota" placeholder="Email Anggota" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="submit" name="addAnggota" value="Tambah" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <a class= "btn btn-info" href="data_user.php">Kembali</a>
                </div>

<?php

include 'lib/lib_anggota.php';

if(isset($_POST['addAnggota'])) {
    
    $nisn               = $_POST['nisn'];
    $nama_anggota       = $_POST['nama_anggota'];
    $jenis_kelamin      = $_POST['jenis_kelamin'];
    $no_telp_anggota    = $_POST['no_telp_anggota'];
    $email_anggota      = $_POST['email_anggota'];
    $alamat             = $_POST['alamat'];
    $password           = md5($_POST['password']);

    $Lib    = new Library();
    $add    = $Lib->addAnggota($nisn, $nama_anggota, $jenis_kelamin, $no_telp_anggota, $email_anggota, 
    $alamat, $password);
    if($add == 'Success') {
        echo '<script language="javascript"> alert("Berhasil Menambah Anggota!"); document.location="data_anggota.php"; </script>';
    }
    
}

?>

</form>

<!-- Js untuk nomor -->
<script type="text/javascript">
		function number(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
  </script>

</main>

</body>
</html>