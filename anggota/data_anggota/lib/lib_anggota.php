<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=perpustakaan','root','');
    }

    public function showAnggota(){
        $sql    = "SELECT * FROM anggota";
        $query  =  $this->db->query($sql);
        return $query;
    }

    public function addAnggota($nisn, $nama_anggota, $jenis_kelamin, $no_telp_anggota, $email_anggota, $alamat, $password) {
        $sql    = "INSERT INTO anggota (nisn, nama_anggota, jenis_kelamin, no_telp_anggota, email_anggota, alamat, password)
                   VALUES ('$nisn', '$nama_anggota', '$jenis_kelamin', '$no_telp_anggota', '$email_anggota', '$alamat', '$password' )";

        $query  = $this->db->query($sql);

        if(!$query){
                echo '<script language="javascript">alert("NISN sudah terdaftar!"); document.location="data_anggota.php"; </script>';
            }
    }

    public function editAnggota($id_anggota){
        $sql    = "SELECT * FROM anggota WHERE id_anggota = '$id_anggota' ";
        $query  = $this->db->query($sql);
        return $query;
    }

    public function updateAnggota($id_anggota, $nisn, $nama_anggota, $jenis_kelamin, $no_telp_anggota, $email_anggota, $alamat){
        $sql    = "UPDATE anggota SET nisn='$nisn', nama_anggota='$nama_anggota', jenis_kelamin='$jenis_kelamin', no_telp_anggota='$no_telp_anggota', email_anggota='$email_anggota', alamat='$alamat' 
                   WHERE id_anggota = '$id_anggota'";
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal edit data!"); document.location="add_anggota.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil tambah data!"); document.location="data_anggota.php"; </script>';
        }
    }

    public function deleteAnggota($id_anggota){
        $sql   = "DELETE FROM anggota WHERE id_anggota='$id_anggota'";
        $query = $this->db->query($sql); 
    }

}

?>