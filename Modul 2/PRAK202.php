<?php
    $nama = $nim = $jenis ="";
    $nama0 = $nim0 = $jenis0 ="";
    
    if(isset($_POST["Submit"])){
        if(empty($_POST["Nama"])){
            $nama0 = "nama tidak boleh kosong";
        }else{
            $nama = $_POST["Nama"];
        }

        if(empty($_POST["Nim"])){
            $nim0 = "nim tidak boleh kosong";
        }else{
            $nim = $_POST["Nim"];
        }

        if(empty($_POST["Jenis"])){
            $jenis0 = "jenis kelamin tidak boleh kosong";
        }else{
            $jenis = $_POST["Jenis"];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .warn{color: red;}
    </style>
</head>
<body>
    <form action="PRAK202.php" method="post">
        <label>Nama: </label>
        <input type="text" name="Nama">
        <span class="warn">* <?php echo $nama0;?></span><br>
        <label>Nim: </label>
        <input type="text" name="Nim">
        <span class="warn">* <?php echo $nim0;?></span><br>
        <label>Jenis Kelamin: </label>
        <span class="warn">* <?php echo $jenis0;?></span><br>
        <input type="radio" name="Jenis" value="Laki-Laki">
        <label>Laki-Laki</label><br>
        <input type="radio" name="Jenis" value="Perempuan">
        <label>Perempuan</label><br>
        <input type="submit" name="Submit">
    </form>
</body>
</html>
<br>
<?php
    if(isset($_POST["Submit"]) and $nama0=="" and $nim0 =="" and $jenis0 ==""){

        echo "<h2>Output:</h2>$nama<br>$nim<br>$jenis";
    }
?>