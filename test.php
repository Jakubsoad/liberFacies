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

//todo przetestowac posty, gety i requesty!!!
?>

