<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan";

// ini buat koneksi
$conn = new mysqli($server, $username, $password, $database);
// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>