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

if ($login!=$_POST['login']) {
    $_SESSION['error']=1;
    header("Location: signUp.php");
    exit();
}





$query = mysqli_query($conn, "INSERT INTO User VALUES (NULL, '$login', '$email', '$pwd')");
$u=mysqli_insert_id($conn);


$q2=mysqli_query($conn, "SELECT * FROM User WHERE id='$u'");
$user = mysqli_fetch_assoc($q2);
foreach ($user as $q) {
    echo $q . "<br>";
}
