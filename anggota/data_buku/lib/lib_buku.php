<?php

class lib_buku{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=perpustakaan', 'root' ,'');
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

    public function pinjamBuku($id_peminjaman, $id_user, $id_buku, $tgl_pinjam, $tgl_kembali, $jumlah){
        $sql   = "UPDATE buku SET no_ktp='$no_ktp', nama='$nama', no_telp='$no_telp', jabatan='$jabatan', 
        email='$email', username='$username', password='$password' WHERE id_pgw='$id_pgw'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_pegawai.php" target="frmMain">';
        }
    }

    public function showBuku1($id_buku, $id_kategori, $id_pengarang, $id_penerbit){
        $sql    = "SELECT kategori.id_kategori, kategori.nama_kategori, penerbit.id_penerbit, penerbit.nama_penerbit, 
        pengarang.id_pengarang, pengarang.nama_pengarang, buku.id_buku, buku.id_kategori, buku.id_penerbit, buku.id_pengarang, buku.isbn,
        buku.judul_buku, buku.tahun_terbit, buku.halaman, buku.stok, buku.gambar, buku.deskripsi 
        FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori
        INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit INNER JOIN pengarang 
        ON buku.id_pengarang = pengarang.id_pengarang
        ON id_buku = '$id_buku' ";
        $query  = $this->db->query($sql);
        return $query;
    }
    
}

?>