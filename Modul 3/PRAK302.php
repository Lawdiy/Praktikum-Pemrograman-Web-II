<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .image{
            width: 20px;
            height: 20px;
        }
        .right{
            display: inline-block;
            text-align: right;
        }
    </style>
</head>
<body>
    <form action="PRAK302.php" method="post">
        <label>Tinggi :</label>
        <input type="number" name="value"required><br>
        <label>Alamat Gambar :</label>
        <input type="text" name="link" required><br>
        <input type="submit" name="submit" value="Cetak"><br><br>

        <?php
        if(isset($_POST['submit'])){
            $n = $_POST['value'];
            $url = $_POST['link'];
            $i = $n;

            while($i != 0){
                $j = 1;
                echo"<div class='right'>";
                
                while($j <= $i){
                    echo" <img class='image' src='$url'>";
                    $j++;
                }
                echo "<br>";
                $i--;
            }
        }
        ?>
    </form>
</body>
</html>