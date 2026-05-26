<?php
require_once("Koneksi.php");
function getMember(){
    $pdo = getKoneksi();
    $stmt = $pdo->query("SELECT * from member");
    return $stmt -> fetchAll (PDO::FETCH_ASSOC);
}

function getMemberById($id){
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * from member WHERE id_member = ?");
    $stmt -> execute([$id]);
    return $stmt -> fetchAll (PDO::FETCH_ASSOC);
}

function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar){
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    return $stmt -> execute ([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar]);
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar){
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? WHERE id_member = ?");
    return $stmt -> execute ([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id]);
}

function deleteMember ($id){
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("DELETE from member WHERE id_member = ?");
    return $stmt -> execute ([$id]);
}

function getBuku(){
    $pdo = getKoneksi();
    $stmt = $pdo->query("SELECT * from buku");
    return $stmt -> fetchAll (PDO::FETCH_ASSOC);
}

function getBukuById($id){
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * from buku WHERE id_buku = ?");
    $stmt -> execute([$id]);
    return $stmt -> fetchAll (PDO::FETCH_ASSOC);
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun]);
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun, $id]);
}

function deleteBuku($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("DELETE FROM buku WHERE id_buku = ?");
    return $stmt->execute([$id]);
}

function getPeminjaman() {
    $pdo = getKoneksi();
    $sql = "SELECT p.*, m.nama_member, b.judul_buku 
            FROM peminjaman p 
            JOIN member m ON p.id_member = m.id_member 
            JOIN buku b ON p.id_buku = b.id_buku
            ORDER BY p.id_peminjaman ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPeminjamanById($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id]);
}

function deletePeminjaman($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    return $stmt->execute([$id]);
}
?>