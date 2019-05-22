<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-22
 * Time: 07:57
 */

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "liberFacies";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn)
    die("Connection error: " . mysqli_connect_error());
