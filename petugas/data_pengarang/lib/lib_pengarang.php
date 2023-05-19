<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=perpustakaan','root','');
    }

    public function showPengarang(){
        $sql    = "SELECT * FROM pengarang";
        $query  =  $this->db->query($sql);
        return $query;
    }

    public function addPengarang($nama_pengarang, $email_pengarang, $no_telp_pengarang) {
        $sql    = "INSERT INTO pengarang (nama_pengarang, email_pengarang, no_telp_pengarang)
                   VALUES ('$nama_pengarang', '$email_pengarang', '$no_telp_pengarang')";
        
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal tambah data!"); document.location="add_pengarang.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil tambah data!"); document.location="data_pengarang.php"; </script>';
        }

    }

    public function editPengarang($id_pengarang){
        $sql    = "SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang' ";
        $query  = $this->db->query($sql);
        return $query;
    }

    public function updatePengarang($id_pengarang, $nama_pengarang, $email_pengarang, $no_telp_pengarang){
        $sql    = "UPDATE pengarang SET nama_pengarang='$nama_pengarang', email_pengarang='$email_pengarang', no_telp_pengarang='$no_telp_pengarang' 
                   WHERE id_pengarang = '$id_pengarang'";
        $query  = $this->db->query($sql);

        if(!$query){
            echo '<script language="javascript">alert("Gagal edit data!"); document.location="add_pengarang.php"; </script>';
        }
        else {
            echo '<script language="javascript">alert("Berhasil Edit Data!"); document.location="data_pengarang.php"; </script>';
        }
    }

    public function deletePengarang($id_pengarang){
        $sql   = "DELETE FROM pengarang WHERE id_pengarang = '$id_pengarang'";
        $query = $this->db->query($sql); 
    }

}

?>