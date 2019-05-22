<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 10:10
 */

if (!isset($_SESSION['login']))
{
    header("Location: index.php");
    exit();
}
session_start();
require_once "dbConn.php";
echo "Hello ";
echo $_SESSION['login'] . "!";
//sprawdzic czy about jest puste, jezeli tak to zaproponowac wypelnienie
$query = mysqli_query($conn, "SELECT ")