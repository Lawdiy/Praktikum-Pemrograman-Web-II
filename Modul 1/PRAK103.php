<?php
$Celcius = 37.841;
$Reamur = round(4/5 * $Celcius, 4);
$Fahrenheit = round(9/5 * $Celcius + 32, 4);
$Kelvin = round($Celcius + 273.15, 4);

echo "Fahrenheit (F) = $Fahrenheit<br>";
echo "Reamur (R) = $Reamur<br>";
echo "Kelvin (K) = $Kelvin<br>";
?>