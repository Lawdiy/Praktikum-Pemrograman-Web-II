<?php
require_once('Model.php');

$isEdit = false;
$buku = null;

if(isset($_GET['id'])) {
    $result = getBukuById($_GET['id']);
    if(!empty($result)) {
        $buku = $result[0];
        $isEdit = true;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $penulis = $_POST['penulis'] ?? '';
    $penerbit = $_POST['penerbit'] ?? '';
    $tahun = $_POST['tahun'] ?? '';

    if($isEdit && isset($_GET['id'])) {
        $success = updateBuku($_GET['id'], $judul, $penulis, $penerbit, $tahun);
    } else {
        $success = insertBuku($judul, $penulis, $penerbit, $tahun);
    }

    if($success) {
        header("Location: Buku.php?success=1");
        exit;
    } else {
        $error = "Gagal menyimpan data buku";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Buku</title>
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
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        input:focus {
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
            <h1><?= $isEdit ? 'Edit Buku' : 'Tambah Buku Baru' ?></h1>
        </div>

        <?php if(isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul" required value="<?= htmlspecialchars($buku['judul_buku'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" required value="<?= htmlspecialchars($buku['penulis'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" required value="<?= htmlspecialchars($buku['penerbit'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input type="number" id="tahun" name="tahun" required value="<?= htmlspecialchars($buku['tahun_terbit'] ?? '') ?>">
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">Simpan</button>
                <a href="Buku.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>