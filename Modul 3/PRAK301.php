<?php
    $n = "";
    if(isset($_POST['submit'])){
        $n = $_POST['value'];
        $i = 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .red{
            color: red;
        }
        .green{
            color: green;
        }
    </style>
</head>
<body>
    <form action="PRAK301.php" method="post">
    <label>Jumlah Peserta :</label>
    <input type="number" name="value" value="<?php echo $n; ?>" required><br>
    <input type="submit" name="submit" value="Cetak">
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        while ($i <= $n){
            if($i % 2 == 0){
                echo "<h3 class='green'>Peserta ke-$i</h3>";
            }else{
                echo "<h3 class='red'>Peserta ke-$i</h3>";
            }
            $i++;
        }
    }
?>