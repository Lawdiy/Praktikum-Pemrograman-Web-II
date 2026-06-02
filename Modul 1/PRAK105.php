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
            background-color: red;
            font-size: 25px;
            padding: 20px 3px;
        }
        td{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <table>
    <?php
        $Handphone = array("1" => "Samsung Galaxy S22", "2" => "Samsung Galaxy S22+", "3" => "Samsung Galaxy A03", "4" => "Samsung Galaxy Xcover 5");

        echo "<th>Daftar Smartphone Samsung</th><br>";
        foreach ($Handphone as $key => $HP){
    
        echo "<tr>
        <td>$HP <br> </td>
        </tr>";
        }
    ?>
    </table>
</body>
</html>