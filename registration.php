<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 10:16
 */

//validation
//connect with database
session_start();

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "liberFacies";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn)
    die("Connection error: ".mysqli_connect_error());

$login = mysqli_real_escape_string($conn, $_POST['login']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
$pwd2 = mysqli_real_escape_string($conn,$_POST['pwd2']);

$checkTable = mysqli_query($conn, "SELECT login FROM User WHERE login='$login'");
$numLog = mysqli_num_rows($checkTable);

if (($login!=$_POST['login'])|| ($numLog>0) || (strlen($login)<4) || (strlen($login)>20)) {
    $_SESSION['error']="Wrong Login!";
    header("Location: signUp.php");
    exit();
}
$filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

$checkTable = mysqli_query($conn, "SELECT email FROM User WHERE email='$email'");
$numLog = mysqli_num_rows($checkTable);

if (($filterEmail!=$email) || ($filterEmail==false) || ($numLog>0))
{
    $_SESSION['error']="Wrong E-mail!";
    header("Location: signUp.php");
    exit();
}

$sanitizePwd = filter_var($pwd, FILTER_SANITIZE_ENCODED);
if (($pwd!=$pwd2) || strlen($pwd)<6 || $pwd!=$sanitizePwd)
{
    $_SESSION['error']="Wrong Password(s)!";
    header("Location: signUp.php");
    exit();
}

$pwd=password_hash($pwd, PASSWORD_DEFAULT);

$query = mysqli_query($conn, "INSERT INTO User VALUES (NULL, '$login', '$email', '$pwd')");
$u=mysqli_insert_id($conn);


$q2=mysqli_query($conn, "SELECT login FROM User WHERE id='$u'");
$user = mysqli_fetch_assoc($q2);

foreach ($user as $q) {
    echo "Hello ".$q . "!<br>";
}
