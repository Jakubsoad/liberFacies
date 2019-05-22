<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 10:10
 */
session_start();

if (!isset($_SESSION['login']))
{
    header("Location: index.php");
    exit();
}
require_once "dbConn.php";
echo "Hello ";
echo $_SESSION['login'] . "!";
$login = mysqli_real_escape_string($conn, $_SESSION['login']);
$idUser = mysqli_query($conn, "SELECT id FROM User WHERE login='$login'");
$idUser=mysqli_fetch_assoc($idUser);
$idUser=implode($idUser);
//sprawdzic czy about jest puste, jezeli tak to zaproponowac wypelnienie
$query = mysqli_query($conn, "SELECT about FROM info WHERE foreignID='$idUser'");
$query3=mysqli_fetch_assoc($query);
$query3=implode($query3);
if ($query3!="")
{
    echo "<br>About You: <br>";
    echo $query3;
}
else
{
    echo "<br>Write something about you...<br> <input type='text'><br><input type='submit'>";
}

//TODO logout system
?>
<!DOCTYPE html>
<html>
<head>
    <title>liberFacies - Your site</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
</head>
<body>
<center>
    <h1>Hello!</h1>
    <br>
    <a href="signIn.php" style="color: cornflowerblue">Sign in!</a>
    <br><br>
    <a href="signUp.php" style="color: cornflowerblue">Sign up!</a>
</center>
</body>
</html>
