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
$query = "SELECT login from User where email like '%$friend%' or login like '%$friend%'";
$querySearch = mysqli_query($conn, $query);


$numRows = mysqli_num_rows($querySearch);
if ($numRows==0)
{
    $_SESSION['friend']="Your friend doesn't exist :(";
    header("Location: main.php");
    exit();
}
$querySearch = mysqli_fetch_all($querySearch);
$counter = 1;
foreach ($querySearch as $q)
{
    foreach ($q as $a) {
        echo $counter .". ". $a."<br>";
        $counter++;
    }
}