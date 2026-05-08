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
    <input type="number" name="value" required><br>
    <input type="submit" name="submit" value="Cetak">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $n = $_POST['value'];
            $i = 1;
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
</body>
</html>