<?php
    $data = [
        0 => [
            "nomor" => 1,
            "nama" => "Ridho",
            "matkul" => ["Pemrograman I", "Praktikum Pemrograman I", "Pengantar Lingkungan Lahan Basah", "Arsitektur Komputer"],
            "sks" => [2, 1, 2, 3]
        ],
        1 => [
            "nomor" => 2,
            "nama" => "Ratna",
            "matkul" => ["Basis Data I", "Praktikum Basis Data I", "Kalkulus"],
            "sks" => [2, 1, 3]
        ],
        2 => [
            "nomor" => 3,
            "nama" => "Tono",
            "matkul" => ["Rekayasa Perangkat Lunak", "Analisis dan Perancangan Sistem", "Komputasi awan", "Kecerdasan Bisnis"],
            "sks" => [3, 3, 3, 3]
        ]
    ]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .red{
            background-color: red;
        }
        .green{
            background-color: green;
        }

        table, th, td{
            border-collapse: collapse;
            border: 1px solid black;
            padding: 4px 8px;
        }
        th{
            background-color: #CCCCCC
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>

        <?php
            foreach ($data as $index => $array){
                $ttl_mk = count($array['matkul']);
                $ttl_sks = array_sum($array['sks']);

                for ($i = 0; $i < $ttl_mk; $i++){
                    echo "<tr>";
                    if ($i == 0){
                        echo "<td>" . $array['nomor']. "</td>";
                        echo "<td>" . $array['nama']. "</td>";
                    } else{
                        echo "<td></td>";
                        echo "<td></td>";
                    }

                    echo "<td>" . $array['matkul'][$i] . "</td>";
                    echo "<td>" . $array['sks'][$i] . "</td>";

                    if ($i == 0){
                        echo "<td>" . $ttl_sks. "</td>";
                    } else{
                        echo "<td></td>";
                    }


                    if ($i == 0 and $ttl_sks < 7){
                        echo "<td class='red'>Revisi KRS</td>";
                    } else if($i == 0 and $ttl_sks >= 7){
                        echo "<td class='green'>Tidak Revisi</td>";
                    } else{
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>