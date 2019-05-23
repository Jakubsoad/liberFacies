<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 10:09
 */
session_start();
if (isset($_SESSION['error'])) {
    echo '<p style="color:red">'.$_SESSION['error'].'</p>';
    unset($_SESSION['error']);
}
if (isset($_SESSION['login']))
{
    header("Location: main.php");
    exit();
}
if (isset($_SESSION['success']))
{
    echo '<p style="color:forestgreen">'.$_SESSION['success'].'</p>';
    unset($_SESSION['success']);
}
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
<h1 style="color: cornflowerblue">Sign In!</h1>
<br>
<form method="post" action="login.php">
    <input type="text" name="login" placeholder="Login..."><br><br>
    <input type="password" name="pwd" placeholder="Password..."><br><br>
    <button type="submit">Sign In!</button>

</form>
</center>

</body>
</html>

