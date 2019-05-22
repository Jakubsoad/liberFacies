<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 10:24
 */

if (!isset($_POST['login']))
{
    header("Location: signIn.php");
    exit();
}
session_start();
require_once "dbConn.php";

$login = mysqli_real_escape_string($conn, $_POST['login']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$query = mysqli_query($conn, "SELECT * FROM User WHERE login='$login'");
$dbLogin = mysqli_num_rows($query);

$query = mysqli_query($conn, "SELECT pwd FROM User WHERE login='$login'");
$f= mysqli_fetch_assoc($query);
$q=implode($f);

if ($dbLogin!=1)
{
    header("Location: signIn.php");
    $_SESSION['error']="Wrong login or password!";
    exit();
}
elseif (!password_verify($pwd, $q))
{
    header("Location: signIn.php");
    $_SESSION['error']="Wrong login or password!";
    exit();
}
else
{

    $_SESSION['login'] = $login;
    header("Location: main.php");
}




