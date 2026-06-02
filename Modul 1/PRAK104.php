<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            border: 2px solid black;
        }
        th{
            border: 2px solid black;
        }
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <table>
    <?php

        $Smartphone = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
                
        
        echo"<th>Daftar Smartphone Samsung</th><br>";
        foreach($Smartphone as $Hp){
            echo "<tr><td>$Hp</td></tr>";
        }
    ?>
    </table>
</body>
</html>