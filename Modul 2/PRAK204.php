<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="PRAK204.php" method="post">
    <label>Nilai :</label>
    <input type="number" name="value" required><br>
    <input type="submit" name="convert" value="Konversi">
    </form>
</body>
</html>
<br>
<?php
    if(isset($_POST["convert"])){
        $value = $_POST["value"];
        $result;

        if($value < 0){
            $result = "Anda Menginput Bilangan Minus";
        } else if($value == 0){
            $result = "Nol";
        } else if($value > 0 and $value <= 9){
            $result = "Satuan";
        } else if($value >= 11 and $value <= 19){
            $result = "Belasan";
        } else if($value == 10 or $value >= 20 and $value <= 99){
            $result = "Puluhan";
        } else if($value >= 100 and $value <= 999){
            $result = "Ratusan";
        } else{
            $result = "Anda Menginput Melebihi Limit Bilangan";
        }

        echo"<h2>Hasil: $result</h2>";
    }
?>