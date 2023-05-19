<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style2.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 
 <script type="text/javascript">
            
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          var originalAddEventListener = EventTarget.prototype.addEventListener,
                    oldWidth = window.innerWidth;

                EventTarget.prototype.addEventListener = function (eventName, eventHandler, useCapture) {
                    if (eventName === "resize") {
                        originalAddEventListener.call(this, eventName, function (event) {
                            if (oldWidth === window.innerWidth) {
                                return;
                            }
                            else if (oldWidth !== window.innerWidth) {
                                oldWidth = window.innerWidth;
                            }
                            if (eventHandler.handleEvent) {
                                eventHandler.handleEvent.call(this, event);
                            }
                            else {
                                eventHandler.call(this, event);
                            };
                        }, useCapture);
                    }
                    else {
                        originalAddEventListener.call(this, eventName, eventHandler, useCapture);
                    };
                };
            };
            
        </script>

<script type="text/javascript">

$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});

</script>

    <title>DIGILIB SMP 2 GIRITONTRO &copy;</title>
  </head>
  <body>

  <div class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3 mt-3">
        <div class="container">
        <a href="#" class="navbar-brand text-uppercase font-weight-bold">DIGILIB SMP 2 GIRITONTRO</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="../index.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold">Dashboard</a></li>
                    <li class="nav-item"><a href="#buku" class="nav-link text-uppercase font-weight-bold">Buku</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link text-uppercase font-weight-bold">Contact</a></li>
                    <li class="nav-item"><a href="../../logout.php" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container">

<form method="POST" action="pinjam_proses.php">

<table class="table table-striped table-md table-sm table-bordered" cellpadding="8">

<?php
include "../../koneksi.php";


session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['nisn']==""){
		header("location:../../check-login.php?pesan=gagal");

    
    }
    ?>

<?php
// Load file koneksi.php
include "../../koneksi.php";
    
$id_buku  = $_GET['id_buku'];

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
        <h3>Anda Akan meminjam Buku <?php echo $data['judul_buku']; ?></h3>
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

<div class="row">
 <div class="col-lg-6">
  
  <div class="form-group">
   <label>Tanggal Pinjam</label>
   <div class="input-group date">
    <div class="input-group-addon">
           <span class="glyphicon glyphicon-th"></span>
       </div>
       <input placeholder="Pilih tanggal pinjam" type="date" class="form-control md" name="tgl_pinjam">
   </div>
  </div>
  
  <div class="form-group">
   <label>Tanggal Kembali</label>
   <div class="input-group date">
    <div class="input-group-addon">
           <span class="glyphicon glyphicon-th"></span>
       </div>
       <input placeholder="Pilih tanggal kembali" type="date" class="form-control" name="tgl_kembali">
   
   </div>
  </div>
  
  <div class="form-group">
   <label>Stok Buku</label>
   <div class="input-group date">
    <div class="input-group-addon">
           <span class="glyphicon glyphicon-th"></span>
       </div>
       <input name="stok" class="form-control" type="text" value="<?php echo $data['stok']; ?>" readonly>   
   </div>
  </div>


 </div>
</div>

</tr>

<?php
$nisn = $_SESSION['nisn'];

$q1 = mysqli_query($conn, "SELECT * FROM anggota WHERE nisn = '$nisn'");

while ($data = mysqli_fetch_array($q1)){
echo ' 

<div class="form-group">
    <label> Nama Peminjam:</label>
    <input type="text" name="nama_anggota" class="form-control" value="'. $data['nama_anggota'] .'" readonly/>
</div>

<tr>
    <input type="text" name="id_anggota" class="form-control" value="'. $data['id_anggota'] .'" hidden/>
</tr>

' ?>

<?php
   
    }
?>

<?php
$nisn = $_SESSION['nisn'];

$q1 = mysqli_query($conn, "SELECT anggota.id_anggota, anggota.nisn, peminjaman.id_peminjaman, 
peminjaman.id_user, peminjaman.status FROM peminjaman INNER JOIN anggota ON peminjaman.id_user = anggota.id_anggota
WHERE anggota.nisn = '$nisn' ");

while ($data = mysqli_fetch_array($q1)){
echo ' 

<div class="form-group">
    <input type="text" name="status" class="form-control" value="'. $data['status'] .'" readonly hidden/>
</div>

<div class="form-group">
    <input type="text" name="status1" class="form-control" value="Belum Diambil" readonly hidden/>
</div>

<tr>
    <input type="text" name="id_anggota" class="form-control" value="'. $data['id_anggota'] .'" readonly hidden/>
</tr>

' 
?>

<?php
   
    }
?>

<tr>
    <input type="text" name="jumlah" value="1" readonly hidden>
</tr>

<?php

  }

} else{ // Jika data tidak ada

  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";

    } 


?>
</table>

<a type="button" class="btn btn-danger" href="../index.php">Kembali</a>
<input type="submit" class="btn btn-info" name="addPinjam" value="Pinjam">

</form>

</div>

<br>
<footer class="py-3 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Adhiki Cahyacita Eknanda 2023</p>
  </div>
</footer>
<!-- Ini OOP nya -->
<!-- Ini JS nya-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../assets/js/myjs.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
</script>



</body>
</html>