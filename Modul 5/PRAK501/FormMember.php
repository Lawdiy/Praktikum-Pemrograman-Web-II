<?php
require_once('Model.php');
date_default_timezone_set('Asia/Makassar');

$isEdit = false;
$member = null;

if(isset($_GET['id'])) {
    $result = getMemberById($_GET['id']);
    if(!empty($result)) {
        $member = $result[0];
        $isEdit = true;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $nomor = $_POST['nomor'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $tgl_daftar = $_POST['tgl_daftar'] ?? '';
    $tgl_bayar = $_POST['tgl_bayar'] ?? '';

    $tgl_input = $_POST['tgl_daftar'] ?? '';
    $jam_sekarang = date('H:i:s');
    $tgl_daftar = $tgl_input . ' ' . $jam_sekarang; 

    if($isEdit && isset($_GET['id'])) {
        $success = updateMember($_GET['id'], $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    } else {
        $success = insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    }

    if($success) {
        header("Location: Member.php?success=1");
        exit;
    } else {
        $error = "Gagal menyimpan data member";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Member</title>
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
        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        textarea {
            resize: vertical;
            min-height: 60px;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 3px rgba(0, 123, 255, 0.25);
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
            <h1><?= $isEdit ? 'Edit Member' : 'Tambah Member Baru' ?></h1>
        </div>

        <?php if(isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Member</label>
                <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($member['nama_member'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="nomor">Nomor Member</label>
                <input type="text" id="nomor" name="nomor" required value="<?= htmlspecialchars($member['nomor_member'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required><?= htmlspecialchars($member['alamat'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="tgl_daftar">Tanggal Mendaftar</label>
                <input type="date" id="tgl_daftar" name="tgl_daftar" required value="<?= htmlspecialchars(substr($member['tgl_mendaftar'] ?? '', 0, 10)) ?>">
            </div>

            <div class="form-group">
                <label for="tgl_bayar">Tanggal Terakhir Bayar</label>
                <input type="date" id="tgl_bayar" name="tgl_bayar" required value="<?= htmlspecialchars($member['tgl_terakhir_bayar'] ?? '') ?>">
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">Simpan</button>
                <a href="Member.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>