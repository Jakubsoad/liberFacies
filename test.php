<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 17:42
 */

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "liberFacies";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn)
    die("Connection error: " . mysqli_connect_error());

$array = ['id'=>'lelum', 'login'=>2];
$array = $array['id'];
echo $array;
?>


<!DOCTYPE html>
<html>
<head>
    <title>liberFacies</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
</head>
<body>
<center>


</center>
</body>
</html>
