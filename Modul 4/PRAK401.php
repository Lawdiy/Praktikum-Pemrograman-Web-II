<?php
        $p = 0;
        $l = 0;
        $v = "";
        $n = 0;
        if(isset($_POST['cetak'])){
            $p = $_POST['panjang'];
            $l = $_POST['lebar'];
            $v = $_POST['nilai'];
            $n = trim(preg_replace('/\s+/', ' ', $v));
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .matrix{
            border-collapse: collapse
        }
        .line{
            border: 1px solid black;
            padding-right: 5px;
            padding-left: 5px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="PRAK401.php" method="post">
        <label>Panjang</label>
        <input type="number" name="panjang" required value="<?php echo $p; ?>"><br>
        <label>Lebal</label>
        <input type="number" name="lebar" required value="<?php echo $l; ?>"><br>
        <label>Nilai</label>
        <input type="text" name="nilai" required value="<?php echo $v; ?>"><br>
        <input type="submit" name="cetak" value="Cetak">
    </form>

    <br>

        <table class="matrix">
            <?php
                if(isset($_POST['cetak'])){
                    $array = explode(" ", $n);
                    $sm = $p * $l;

                    if(count($array) != $sm){
                        echo "Panjang nilai tidak sesuai dengan ukuran matriks";
                    } else {
                        $index = 0;

                        for ($i = 0; $i < $p; $i++){
                            echo "<tr>";

                            for ($j = 0; $j < $l; $j++){
                                echo "<td class='line'> $array[$index]</td>";
                                $index++;
                            }
                            echo "</tr>";
                        }
                    }
                }
            ?>
        </table>
</body>
</html>