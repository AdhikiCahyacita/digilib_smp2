<?php

class lib_buku{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=perpustakaan','root','');
    }

    public function showBuku(){
        $sql   = "SELECT kategori.id_kategori, kategori.nama_kategori, penerbit.id_penerbit, penerbit.nama_penerbit, 
        pengarang.id_pengarang, pengarang.nama_pengarang, buku.id_buku, buku.id_kategori, buku.id_penerbit, buku.id_pengarang, buku.isbn,
        buku.judul_buku, buku.tahun_terbit, buku.halaman, buku.stok, buku.gambar, buku.deskripsi 
        FROM buku INNER JOIN kategori ON kategori.id_kategori = buku.id_kategori
        INNER JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit INNER JOIN pengarang ON  pengarang.id_pengarang = buku.id_pengarang
        ORDER BY buku.id_buku";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteBuku($id_buku){
        $sql   = "DELETE FROM buku WHERE id_buku='$id_buku'";
        $query = $this->db->query($sql); 
    }
    
}

?>