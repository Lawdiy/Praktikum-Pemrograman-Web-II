<?php
    $data =[
        0 => [
            "NAMA" => "Andi",
            "NIM" => 2101001,
            "UTS" => 87,
            "UAS" => 65,
        ],
        1 => [
            "NAMA" => "Budi",
            "NIM" => 2101002,
            "UTS" => 76,
            "UAS" => 79
        ],
        2 => [
            "NAMA" => "Tono",
            "NIM" => 2101003,
            "UTS" => 50,
            "UAS" => 41
        ],
        3 => [
            "NAMA" => "Jessica",
            "NIM" => 2101004,
            "UTS" => 60,
            "UAS" => 75
        ]
    ]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding-bottom: 10px;
            padding-right: 25px;
            text-align: left
        }
        th{
            background-color: #CCCCCC
        }
    </style>
</head>
<body>
    <table>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>

            <?php
            foreach ($data as $index => $array){
                $nilai = ($array['UTS'] * 0.4) + ($array['UAS'] * 0.6);
                
                if ($nilai >= 80 and $nilai <= 100){
                    $grade = "A";
                } else if ($nilai >= 70 and $nilai <= 79){
                    $grade = "B";
                }else if ($nilai >= 60 and $nilai <= 69){
                    $grade = "C";
                }else if ($nilai >= 50 and $nilai <= 59){
                    $grade = "D";
                }else if ($nilai < 50){
                    $grade = "E";
                }else {
                    $grade = "-";
                }

                echo "<tr>";
                
                echo "<td>". $array['NAMA'] . "</td>" ,
                "<td>" .  $array['NIM'] . "</td>",
                "<td>" . $array['UTS'] . "</td>",
                "<td>" . $array['UAS'] . "</td>",
                "<td>" . $nilai . "</td>",
                "<td>" . $grade . "</td>";
                
                echo "</tr>";
                }
            ?>
    </table>
</body>
</html>