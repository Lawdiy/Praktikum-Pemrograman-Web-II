<?php
if(isset($_POST["konversi"])){
    $value = $_POST["nilai"];
    $start = $_POST["suhu1"];
    $end = $_POST["suhu2"];
    $result;
    $satuan;

    if($start == "Celcius"){
        $celcius = $value;
        $satuan = "°C";
    } else if($start == "Fahrenheit"){
        $celcius = ($value - 32) * 5/9;
        $satuan = "°C";
    } else if($start == "Reamur"){
        $celcius = $value * 5/4;
        $satuan = "°C";
    } else {
        $celcius = $value - 273.15;
        $satuan = "°C";
    }

    if($end == "Celcius"){
        $result = $celcius;
        $satuan = "°C";
    } else if($end == "Fahrenheit"){
        $result = $celcius * 9/5 + 32;
        $satuan = "°F";
    } else if($end == "Reamur"){
        $result = $celcius * 4/5;
        $satuan = "°R";
    } else {
        $result = $celcius + 273.15;
        $satuan = "°K";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="PRAK203.php" method="post">
        <label>Output yang diinginkan:<br>Nilai :</label>
        <input type="number" name="nilai" required><br>
        <label>Dari: </label><br>
        <input type="radio" name="suhu1" value="Celcius">
        <label>Celcius</label><br>
        <input type="radio" name="suhu1" value="Fahrenheit">
        <label>Fahrenheit</label><br>
        <input type="radio" name="suhu1" value="Reamur">
        <label>Reamur</label><br>
        <input type="radio" name="suhu1" value="Kelvin">
        <label>Kelvin</label><br>

        <label>Ke: </label><br>
        <input type="radio" name="suhu2" value="Celcius">
        <label>Celcius</label><br>
        <input type="radio" name="suhu2" value="Fahrenheit">
        <label>Fahrenheit</label><br>
        <input type="radio" name="suhu2" value="Reamur">
        <label>Reamur</label><br>
        <input type="radio" name="suhu2" value="Kelvin">
        <label>Kelvin</label><br>

        <input type="submit" name="konversi" value="Konversi"><br>
    </form>
</body>
</html>
<?php
    if(isset($_POST["konversi"])){
        echo "<h1>Hasil Konversi: $result $satuan</h1>";
    }
?>