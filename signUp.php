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
<h1 style="color: cornflowerblue">Sign Up!</h1>
<br>
<form action="registration.php" method="post">
    <input type="text" name="login" placeholder="Login..."><br><br>
    <input type="text" name="email" placeholder="Email..."><br><br>
    <input type="password" name="pwd" placeholder="Password..."><br><br>
    <input type="password" name="pwd2" placeholder="Repeat password..."><br><br>
    <button type="submit">Submit!</button>
</form>
</center>
</body>
</html>

