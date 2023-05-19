<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin.css" rel="stylesheet">

</head>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nisn']==""){
		header("location:../check-login.php?pesan=gagal");
	}
 
	?>

<body id="page-top">

<div id="container">

<main role="main" class="col-md-auto ml-sm-auto col-lg-12 ">
        <!-- DataTables Example -->
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Buku  </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <div class="container">
<table class="table table-striped table-md table-sm table-bordered" cellpadding="8">

<?php
// Load file koneksi.php
include "../../koneksi.php";

$id_buku = $_GET['id_buku'];

$sql = mysqli_query($conn, "SELECT kategori.id_kategori, kategori.nama_kategori, penerbit.id_penerbit, penerbit.nama_penerbit, 
pengarang.id_pengarang, pengarang.nama_pengarang, buku.id_buku, buku.id_kategori, buku.id_penerbit, buku.id_pengarang, buku.isbn,
buku.judul_buku, buku.tahun_terbit, buku.halaman, buku.stok, buku.gambar, buku.deskripsi 
FROM buku INNER JOIN kategori ON kategori.id_kategori = buku.id_kategori
INNER JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit INNER JOIN pengarang ON  pengarang.id_pengarang = buku.id_pengarang 
WHERE id_buku='$id_buku' "); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){
    ?> 
<tr>
    <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>Buku <?php echo $data['judul_buku']; ?></h3>
    </div>
</tr>

<tr>
    <td>ID Buku</td>
    <td> <?php echo $data['id_buku']; ?> </td>
</tr>

<tr>
    <td>Nama Penulis</td>
    <td> <?php echo $data['nama_pengarang']; ?> </td>
</tr>

<tr>
    <td>Penerbit</td>
    <td> <?php echo $data['nama_penerbit']; ?> </td>
</tr>

<tr>
    <td>Kategori</td>
    <td> <?php echo $data['nama_kategori']; ?> </td>
</tr>

<tr>
    <td>Deskripsi</td>
    <td> <textarea class="form-control" rows="10" readonly> <?php echo $data['deskripsi']; ?> </textarea></td>
</tr>

<tr>
    <td>Gambar</td>
    <td><img src='../../petugas/assets/images/<?php echo $data['gambar']; ?>' width='450' height='300'></td>
</tr>

<tr>
    <td><b> Stok </b></td>
    <td> <?php echo $data['stok']; ?> </td>
</tr>

<?php

  }

} else{ // Jika data tidak ada

  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";

}

?>
</table>

<a type="button" class="btn btn-danger" href="../dashboard.php">Kembali</a>
<a type="button" class="btn btn-info" href="#">Pinjam</a>


              </table>
              </div>
          <div class="card-footer small text-muted">Perpustakaan SMP N 2 Giritontro

          </div>
        </div>


  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../assets/js/demo/datatables-demo.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script>

</main>
</div>

</body>

</html>
