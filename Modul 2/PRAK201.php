<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="PRAK201.php" method="post">
        <label>Nama: 1</label>
        <input type="text" name="Nama1"><br>
        <label>Nama: 2</label>
        <input type="text" name="Nama2"><br>
        <label>Nama: 3</label>
        <input type="text" name="Nama3"><br>
        <input type="submit" name="urutkan" value="Urutkan">
    </form>
</body>
</html>
<?php
    if(isset($_POST["urutkan"])){
    $name1 = $_POST["Nama1"];
    $name2 = $_POST["Nama2"];
    $name3 = $_POST["Nama3"];
        if($name1 >= $name2 and $name1 >= $name3){
            if($name2 >= $name3){
                echo "$name3<br> $name2<br> $name1<br>";
            }else{
                echo "$name2<br> $name3<br> $name<br>1";
            }
        } else if($name2 >= $name1 and $name2 >= $name3){
            if($name1 >= $name3){
                echo "$name3<br> $name1<br> $name2<br>";
            }
            else{
                echo "$name1<br> $name3<br> $name2<br>";
            }
        }else{
            if($name1 >= $name2){
                echo "$name2<br> $name1<br> $name3<br>";
            }else{
                echo "$name1<br> $name2<br> $name3<br>";
            }
        }
    }
?>