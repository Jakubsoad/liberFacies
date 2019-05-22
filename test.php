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

var_dump($q = mysqli_query($conn, "SELECT pwd FROM User WHERE login='ksiunia'"));
echo "<br>";
$i = mysqli_fetch_assoc($q);
var_dump($i);
echo "<br>";
$i = implode($i);
echo $i;
echo "<br>";
echo implode(mysqli_fetch_assoc($q));

