<?php
$n = "";
if(isset($_POST['submit'])){
    $n = $_POST['value'];
}
if(isset($_POST['tambah'])){
    $n= $_POST['value'];
    $n++;
}
if(isset($_POST['kurang'])){
    $n = $_POST['value'];
    $n--;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .size{
            width: 75px;
            height: 75px;
        }
    </style>
</head>
<body>
    <form action="PRAK304.php" method="post">
        <label>Jumlah Bintang </label>
        <input type="number" name="value" value="<?php echo $n; ?>" required><br>
        <input type="submit" name="submit" value="Submit"><br><br>

        <?php
            if($n > 0){
                $img =  "<img class='size' src='star-images-9441.png'>";
                $i = 1;
                
                echo "Jumlah bintang $n<br><br>";
                
                while($i <= $n){
                    echo $img;
                    $i++;
                }
            }
        ?>

        <br>
        <?php if ($n > 0): ?>
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
        <?php endif; ?>
        
    </form>    
</body>
</html>