<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-23
 * Time: 11:06
 */

session_start();
require_once 'dbConn.php';

$friend=filter_input(INPUT_POST, 'friend');
$friend=mysqli_real_escape_string($conn, $friend);

$querySearch = mysqli_query($conn, "SELECT id from User where email='$friend' or login='$friend'");
$numRows = mysqli_num_rows($querySearch);
if ($numRows==0)
{
    $_SESSION['friend']="Your friend doesn't exist :(";
    header("Location: main.php");
    exit();
}