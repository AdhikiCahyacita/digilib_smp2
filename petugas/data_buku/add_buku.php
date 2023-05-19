<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
    <h1 class="h2">Tambah Buku</h1>
  </div>

<form action="lib/add_proses.php" method="POST" enctype="multipart/form-data">

<label>Nama Pengarang</label>
<select name="id_pengarang" id="id_pengarang" class="form-control" onchange='changeValue(this.value)' required>
  
  <option value="">-Pilih-</option>

 <?php
 
 include "../../koneksi.php";
 
$query     = mysqli_query($conn, "SELECT * FROM pengarang order by id_pengarang ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM pengarang");  
$jsArray   = "var prdName = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id1"  value="' . $row['id_pengarang'] . '">' . $row['nama_pengarang'] . '</option>';  
        $jsArray .= "prdName['" . $row['id_pengarang'] . "'] = {nama_pengarang:'" . addslashes($row['nama_pengarang'])."'};\n";
   }

?>

</select>

<label>Nama Penerbit</label>
<select name="id_penerbit" id="id_penerbit" class="form-control" onchange='changeValue2(this.value)' required>
  
  <option value="">-Pilih-</option>


 <?php
 
 include "../../koneksi.php";
 
$query     = mysqli_query($conn, "SELECT * FROM penerbit ORDER BY id_penerbit ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM penerbit");  
$jsArray2   = "var prdName2 = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id2"  value="' . $row['id_penerbit'] . '">' . $row['nama_penerbit'] . '</option>';  
        $jsArray2 .= "prdName2['" . $row['id_penerbit'] . "'] = {nama_penerbit:'" . addslashes($row['nama_penerbit'])."'};\n";
   }

?>

</select>

<label>Kategori</label>
<select name="id_kategori" id="id_kategori" class="form-control" onchange='changeValue3(this.value)' required>
  
  <option value="">-Pilih-</option>

 <?php
 
 include "../../koneksi.php";
 
$query     = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM kategori");  
$jsArray3   = "var prdName3 = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id3"  value="' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';  
        $jsArray3 .= "prdName3['" . $row['id_kategori'] . "'] = {nama_kategori:'" . addslashes($row['nama_kategori'])."'};\n";
   }

?>

</select>

<div class="form-group">
    <label> ISBN: </label> 
    <input type="text" name="isbn" class="form-control" required>
</div>

<div class="form-group">
    <label>Judul Buku:</label>
    <input type="text" name="judul_buku" class="form-control" required>    
</div>

<div class="form-group">
    <label>Tahun Terbit</label>
    <input type="text" name="tahun_terbit" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label>Jumlah Halaman</label>
    <input type="text" name="halaman" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label>Jumlah Stok</label>
    <input type="text" name="stok" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label>Deskripsi</label> <br>
    <textarea name="deskripsi" cols="50" rows="5"></textarea>    
</div>

<div class="form-group">
    <label> Upload Gambar</label> 
    <input type="file" name="gambar" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" name="addBuku" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_buku.php">Kembali</a>
</div>

<!-- Ini JS-->
<script type="text/javascript">
		function number(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>

<script type="text/javascript"> 

<?php
    echo $jsArray;
    echo $jsArray2;
    echo $jsArray3;
?>

function changeValue(id_pengarang){
    document.getElementById('nama_pengarang').value = prdName[id_pengarang].nama_pengarang;
};

function changeValue2(id_penerbit){
    document.getElementById('nama_penerbit').value = prdName2[id_penerbit].nama_penerbit;
};

function changeValue3(id_kategori){
    document.getElementById('nama_kategori').value = prdName3[id_kategori].nama_kategori;
};

</script>

</form>

</main>
</body>
</html>