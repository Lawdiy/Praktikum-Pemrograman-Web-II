<?php
require_once('Model.php');
date_default_timezone_set('Asia/Makassar');  

$isEdit = false;
$peminjaman = null;
$memberList = getMember();
$bukuList = getBuku();


if(isset($_GET['id'])) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$_GET['id']]);
    $peminjaman = $stmt->fetch(PDO::FETCH_ASSOC);
    if($peminjaman) {
        $isEdit = true;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member = $_POST['id_member'] ?? '';
    $id_buku = $_POST['id_buku'] ?? '';
    $tgl_pinjam = $_POST['tgl_pinjam'] ?? '';
    $tgl_kembali = $_POST['tgl_kembali'] ?? '';


    if(empty($id_member) || $id_member == '0') {
        $error = "Pilih member terlebih dahulu!";
    } elseif(empty($id_buku) || $id_buku == '0') {
        $error = "Pilih buku terlebih dahulu!";
    } elseif(empty($tgl_pinjam)) {
        $error = "Tanggal pinjam harus diisi!";
    } elseif(empty($tgl_kembali)) {
        $error = "Tanggal kembali harus diisi!";
    } elseif($tgl_kembali < $tgl_pinjam) {
        $error = "Tanggal kembali tidak boleh sebelum tanggal pinjam!";
    } else {
        if($isEdit && isset($_GET['id'])) {
            $success = updatePeminjaman($_GET['id'], $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
        } else {
            $success = insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
        }

        if($success) {
            header("Location: Peminjaman.php?success=1");
            exit;
        } else {
            $error = "Gagal menyimpan data peminjaman";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Peminjaman</title>
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
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 5px;
        }
        .header {
            margin-bottom: 25px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #333;
            font-size: 22px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
            font-size: 13px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 3px rgba(0, 123, 255, 0.25);
        }
        input.is-invalid, select.is-invalid {
            border-color: #dc3545;
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        .btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
        }
        .btn-submit {
            background-color: #28a745;
            color: white;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
        .btn-cancel:hover {
            background-color: #5a6268;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 3px;
            margin-bottom: 15px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?= $isEdit ? 'Edit Peminjaman' : 'Tambah Peminjaman Baru' ?></h1>
        </div>

        <?php if(isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="id_member">Pilih Member</label>
                <select id="id_member" name="id_member" required
                    class="<?= (isset($error) && (empty($_POST['id_member']) || $_POST['id_member'] == '0')) ? 'is-invalid' : '' ?>">
                    <option value="">-- Pilih Member --</option>
                    <?php foreach($memberList as $member): ?>
                        <option value="<?= $member['id_member'] ?>" 
                            <?= (isset($_POST['id_member']) && $_POST['id_member'] == $member['id_member']) ? 'selected' : 
                                (($peminjaman && $peminjaman['id_member'] == $member['id_member']) ? 'selected' : '') ?>>
                            <?= htmlspecialchars($member['nama_member']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_buku">Pilih Buku</label>
                <select id="id_buku" name="id_buku" required
                    class="<?= (isset($error) && (empty($_POST['id_buku']) || $_POST['id_buku'] == '0')) ? 'is-invalid' : '' ?>">
                    <option value="">-- Pilih Buku --</option>
                    <?php foreach($bukuList as $buku): ?>
                        <option value="<?= $buku['id_buku'] ?>" 
                            <?= (isset($_POST['id_buku']) && $_POST['id_buku'] == $buku['id_buku']) ? 'selected' : 
                                (($peminjaman && $peminjaman['id_buku'] == $buku['id_buku']) ? 'selected' : '') ?>>
                            <?= htmlspecialchars($buku['judul_buku']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="date" id="tgl_pinjam" name="tgl_pinjam" required
                    class="<?= (isset($error) && empty($_POST['tgl_pinjam'])) ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars($_POST['tgl_pinjam'] ?? $peminjaman['tgl_pinjam'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="date" id="tgl_kembali" name="tgl_kembali" required
                    class="<?= (isset($error) && empty($_POST['tgl_kembali'])) ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars($_POST['tgl_kembali'] ?? $peminjaman['tgl_kembali'] ?? '') ?>">
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">Simpan</button>
                <a href="Peminjaman.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>