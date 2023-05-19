<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nip']==""){
		header("location:../petugas-login.php?pesan=gagal");
	}
 
?>

<main role="main" class="col-md-auto ml-sm-auto col-lg-12 ">

<form action="update_status.php" method="POST">

<table class="table table-striped table-sm" cellpadding="8">

<?php

include "../koneksi.php";

$id_peminjaman = $_GET['id_peminjaman'];

$sql = mysqli_query($conn, "SELECT buku.id_buku, buku.stok, peminjaman.id_peminjaman, peminjaman.status FROM peminjaman
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku WHERE peminjaman.id_peminjaman='$id_peminjaman' ");
$row = mysqli_num_rows($sql);

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){
    ?> 
<tr>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>Edit Status Buku</h3>
    </div>
</tr>

<input type="text" name="id_peminjaman" value="<?php echo $data['id_peminjaman']; ?>" readonly hidden/>
<input type="text" name="id_buku" value="<?php echo $data['id_buku']; ?>" readonly hidden/>
<input type="text" name="stok" value="<?php echo $data['stok']; ?>" readonly hidden/>

<tr>
<label>Status</label>
<select name="status" id="status" class="form-control col-md-2" required>
  
  <option value="Belum Diambil">Belum Diambil</option>
  <option value="Diambil">Diambil</option>
  <option value="Sudah Kembali">Sudah Kembali</option>

</select>

</tr>

<?php

  }

} else{ // Jika data tidak ada

  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";

}

?>
</table>

<input type="submit" value="Edit" class="btn btn-success">

<a type="button" class="btn btn-info" href="dashboard.php">Kembali</a>

<!-- Ini JS nya-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="assets/js/myjs.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
</script>

</form>
</main>
</body>
</html>