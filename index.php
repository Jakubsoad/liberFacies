<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 09:24
 */
//TODO if logged->main.php
session_start();
if (isset($_SESSION['login']))
{
    header("Location: main.php");
    exit();
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
<h1>Hello!</h1>
<br>
<a href="signIn.php" style="color: cornflowerblue">Sign in!</a>
<br><br>
<a href="signUp.php" style="color: cornflowerblue">Sign up!</a>
</center>
</body>
</html>

