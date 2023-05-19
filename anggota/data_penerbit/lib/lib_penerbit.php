<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=perpustakaan','root','');
    }

    public function showPenerbit(){
        $sql    = "SELECT * FROM penerbit";
        $query  =  $this->db->query($sql);
        return $query;
    }

    public function addPenerbit($nama_penerbit, $alamat_penerbit, $no_telp_penerbit, $email_penerbit) {
        $sql    = "INSERT INTO penerbit (nama_penerbit, alamat_penerbit, no_telp_penerbit, email_penerbit)
                   VALUES ('$nama_penerbit', '$alamat_penerbit', '$no_telp_penerbit', '$email_penerbit')";
        
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal tambah data!"); document.location="add_penerbit.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil tambah data!"); document.location="data_penerbit.php"; </script>';
        }

    }

    public function editPenerbit($id_penerbit){
        $sql    = "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit' ";
        $query  = $this->db->query($sql);
        return $query;
    }

    public function updatePenerbit($id_penerbit, $nama_penerbit, $alamat_penerbit, $no_telp_penerbit, $email_penerbit){
        $sql    = "UPDATE penerbit SET nama_penerbit='$nama_penerbit', alamat_penerbit='$alamat_penerbit', no_telp_penerbit='$no_telp_penerbit', email_penerbit='$email_penerbit' 
                   WHERE id_penerbit = '$id_penerbit'";
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal edit data!"); document.location="add_penerbit.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil edit data!"); document.location="data_penerbit.php"; </script>';
        }
    }

    public function deletePenerbit($id_penerbit){
        $sql   = "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'";
        $query = $this->db->query($sql); 
    }

}

?>