<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }
        .header p {
            color: #666;
            font-size: 14px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .menu-card {
            background: white;
            border: 1px solid #ddd;
            padding: 30px;
            text-align: center;
            border-radius: 5px;
        }
        .menu-card h2 {
            color: #333;
            margin-bottom: 15px;
            font-size: 20px;
        }
        .menu-card p {
            color: #666;
            margin-bottom: 20px;
            font-size: 13px;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .btn-view {
            background-color: #007bff;
            color: white;
        }
        .btn-view:hover {
            background-color: #0056b3;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        .footer {
            text-align: center;
            color: #666;
            margin-top: 40px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Perpusmok</h1>
            <p>Sistem Manajemen Peminjaman Buku digital</p>
        </div>

        <div class="menu-grid">
            <div class="menu-card">
                <h2>Buku</h2>
                <p>Kelola daftar buku di perpustakaan</p>
                <div class="btn-group">
                    <a href="Buku.php" class="btn btn-view">Lihat Buku</a>
                    <a href="FormBuku.php" class="btn btn-add">Tambah</a>
                </div>
            </div>

            <div class="menu-card">
                <h2>Member</h2>
                <p>Kelola data anggota perpustakaan</p>
                <div class="btn-group">
                    <a href="Member.php" class="btn btn-view">Lihat Member</a>
                    <a href="FormMember.php" class="btn btn-add">Tambah</a>
                </div>
            </div>

            <div class="menu-card">
                <h2>Peminjaman</h2>
                <p>Kelola peminjaman dan pengembalian buku</p>
                <div class="btn-group">
                    <a href="Peminjaman.php" class="btn btn-view">Lihat Data</a>
                    <a href="FormPeminjaman.php" class="btn btn-add">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>