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
                <thead>
                <tr>
                    <th>Nomor</th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Stok</th>
                    <th>Selengkapnya</th>
                </tr>
                </thead>

                <tbody>
                
                <?php
require("lib/lib_buku.php");
$Lib = new lib_buku();
$no  = 0;
$show = $Lib->showBuku();
while($data = $show->fetch(PDO::FETCH_OBJ)){
$no++;
echo "
<tr>
<th> $no </th>
<td>$data->isbn </></td>
<td>$data->judul_buku</td>
<td>$data->nama_kategori</td>
<td>$data->nama_pengarang</td>
<td>$data->nama_penerbit</td>
<td>$data->tahun_terbit</td>
<td>$data->halaman</td>
<td>$data->stok</td>
<td><a class='btn btn-info' href='ket_buku.php?id_buku='.$data->id_buku.'' target='frmMain'> Selengkapnya</td>
</tr>";
};
?>
		</td>
    
    </tr>
                </tbody>

              </table>
            </div>
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
