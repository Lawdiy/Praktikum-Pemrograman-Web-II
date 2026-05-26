<?php
require_once('Model.php');

$memberMap = array();
$bukuMap = array();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $success = deletePeminjaman($delete_id);
    if($success) {
        header("Location: Peminjaman.php?success=1");
        exit;
    }
}

try {
    $pdo = getKoneksi();
    $sql = "SELECT * FROM peminjaman ORDER BY id_peminjaman ASC";
    $stmt = $pdo->query($sql);
    $peminjamanList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $memberMap = array();
    $bukuMap = array();
    
    $memberStmt = $pdo->query("SELECT id_member, nama_member FROM member");
    while($row = $memberStmt->fetch(PDO::FETCH_ASSOC)) {
        $memberMap[$row['id_member']] = $row['nama_member'];
    }
    
    $bukuStmt = $pdo->query("SELECT id_buku, judul_buku FROM buku");
    while($row = $bukuStmt->fetch(PDO::FETCH_ASSOC)) {
        $bukuMap[$row['id_buku']] = $row['judul_buku'];
    }
} catch(Exception $e) {
    $peminjamanList = array();
    $memberMap = array();
    $bukuMap = array();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
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
            max-width: 1200px;
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
            <h1>Data Peminjaman</h1>
            <div class="header-buttons">
                <a href="FormPeminjaman.php" class="btn btn-add">Tambah Peminjaman</a>
                <a href="index.php" class="btn btn-back">Kembali</a>
            </div>
        </div>

        <?php if(isset($_GET['success'])): ?>
            <div class="success-msg" style="display: block;">
                Operasi berhasil dilakukan
            </div>
        <?php endif; ?>

        <?php if(count($peminjamanList) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member</th>
                        <th>Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($peminjamanList as $pinjam): ?>
                        <tr>
                            <td><?= htmlspecialchars($pinjam['id_peminjaman']) ?></td>
                            <td><?= htmlspecialchars(isset($memberMap[$pinjam['id_member']]) ? $memberMap[$pinjam['id_member']] : '-') ?></td>
                            <td><?= htmlspecialchars(isset($bukuMap[$pinjam['id_buku']]) ? $bukuMap[$pinjam['id_buku']] : '-') ?></td>
                            <td><?= htmlspecialchars($pinjam['tgl_pinjam']) ?></td>
                            <td><?= htmlspecialchars($pinjam['tgl_kembali']) ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="FormPeminjaman.php?id=<?= $pinjam['id_peminjaman'] ?>" class="btn btn-edit">Edit</a>
                                    <form method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <input type="hidden" name="delete_id" value="<?= $pinjam['id_peminjaman'] ?>">
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
                <p>Belum ada data peminjaman. <a href="FormPeminjaman.php">Tambah peminjaman</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>