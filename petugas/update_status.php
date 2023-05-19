<?php
include "../koneksi.php";

$id_peminjaman      = $_POST['id_peminjaman'];
$id_buku            = $_POST['id_buku'];
$status             = $_POST['status'];
$stok               = $_POST['stok'];
$stok_akhir         = $stok+1;

      $query = "UPDATE peminjaman SET status='$status' WHERE id_peminjaman='$id_peminjaman' ";
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

      if($sql){

        if($status =="Sudah Kembali") {
            $sql2   = mysqli_query($conn, "UPDATE buku SET stok='$stok_akhir' WHERE id_buku = '$id_buku' ");
        
            echo '<script language="javascript">alert("Stok berhasil diperbaharui!"); document.location="dashboard.php"; </script>'; 
        }

        echo '<script language="javascript">alert("Status berhasil diperbaharui!"); document.location="dashboard.php"; </script>';

    } else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='dashboard.php'>Kembali Ke Form</a>";
      }
?>