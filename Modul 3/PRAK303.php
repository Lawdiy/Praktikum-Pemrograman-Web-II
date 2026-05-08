<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .size{
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <form action="PRAK303.php" method="post">
        <label>Batas Bawah :</label>
        <input type="number" name="start" required><br>
        <label>Batas Atas :</label>
        <input type="number" name="end" required><br>
        <input type="submit" name="submit" value="Cetak"><br>

        <?php
            if(isset($_POST['submit'])){
                $start = $_POST['start'];
                $end = $_POST['end'];

                do{
                    if(($start + 7) % 5 == 0){
                        echo "<img class='size' src='star-images-9441.png'> ";
                    }else{
                        echo "$start ";
                    }
                    $start++;
                } while ($start <= $end);
            }
        ?>
    </form>
</body>
</html>