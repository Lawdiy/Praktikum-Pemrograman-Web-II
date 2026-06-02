<?php
require_once('Model.php');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $success = deleteBuku($delete_id);
    if($success) {
        header("Location: Buku.php?success=1");
        exit;
    }
}

$bukuList = getBuku();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
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
            background: white;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #333;
            font-size: 24px;
        }
        .header-buttons {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            font-size: 11px;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            font-size: 11px;
            border: none;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table thead {
            background-color: #f8f9fa;
            border-bottom: 2px solid #ddd;
        }
        table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            color: #333;
            font-size: 13px;
        }
        table td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }
        table tbody tr:hover {
            background-color: #f9f9f9;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        .empty-message {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        .success-msg {
            background-color: #d4edda;
            color: #155724;
            padding: 10px 15px;
            border: 1px solid #c3e6cb;
            border-radius: 3px;
            margin-bottom: 15px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Daftar Buku</h1>
            <div class="header-buttons">
                <a href="FormBuku.php" class="btn btn-add">Tambah Buku</a>
                <a href="index.php" class="btn btn-back">Kembali</a>
            </div>
        </div>

        <?php if(isset($_GET['success'])): ?>
            <div class="success-msg" style="display: block;">
                Operasi berhasil dilakukan
            </div>
        <?php endif; ?>

        <?php if(count($bukuList) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bukuList as $buku): ?>
                        <tr>
                            <td><?= htmlspecialchars($buku['id_buku']) ?></td>
                            <td><?= htmlspecialchars($buku['judul_buku']) ?></td>
                            <td><?= htmlspecialchars($buku['penulis']) ?></td>
                            <td><?= htmlspecialchars($buku['penerbit']) ?></td>
                            <td><?= htmlspecialchars($buku['tahun_terbit']) ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="FormBuku.php?id=<?= $buku['id_buku'] ?>" class="btn btn-edit">Edit</a>
                                    <form method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <input type="hidden" name="delete_id" value="<?= $buku['id_buku'] ?>">
                                        <button type="submit" class="btn btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-message">
                <p>Belum ada data buku. <a href="FormBuku.php">Tambah buku</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>