<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=perpustakaan','root','');
    }

    public function showKategori(){
        $sql    = "SELECT * FROM kategori";
        $query  =  $this->db->query($sql);
        return $query;
    }

    public function addKategori($nama_kategori) {
        $sql    = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
        
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal tambah data!"); document.location="add_kategori.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil tambah data!"); document.location="data_kategori.php"; </script>';
        }

    }

    public function editKategori($id_kategori){
        $sql    = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori' ";
        $query  = $this->db->query($sql);
        return $query;
    }

    public function updateKategori($id_kategori, $nama_kategori){
        $sql    = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori = '$id_kategori'";
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal edit data!"); document.location="data_kategori.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil Edit data!"); document.location="data_kategori.php"; </script>';
        }
    }

    public function deleteKategori($id_kategori){
        $sql   = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
        $query = $this->db->query($sql); 
    }

}

?>