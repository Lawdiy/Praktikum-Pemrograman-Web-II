<?php
$input ="";
$output="";

if(isset($_POST['submit'])){
    $input = $_POST['word'];
    $i = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="PRAK305.php" method="post">
        <input type="text" name="word" required>
        <input type="submit" name="submit" value="submit"><br><br>
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        while($i < strlen($input)){
            $char = $input[$i];
            $uppercase = strtoupper($char);
            $lowercase = strtolower($char) . strtolower($char). strtolower($char). strtolower($char). strtolower($char);
            $output .= $uppercase . $lowercase;
            $i++;
        }

        echo "<strong>Input: </strong><br><br> $input<br><br>";
        echo "<strong>Output: </strong><br><br>". $output;
    }
?>