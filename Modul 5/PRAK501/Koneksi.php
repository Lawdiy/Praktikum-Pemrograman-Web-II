<?php
    $host = 'localhost';
    $dbname = 'modul5';
    $username = 'root';
    $password = '';

    function getKoneksi() {
        global $host, $dbname, $username, $password;
        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            die("Koneksi Gagal: ". $e->getMessage());
        }
    }
?>