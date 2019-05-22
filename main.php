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

$login = mysqli_real_escape_string($conn, $_SESSION['login']);
$idUser = mysqli_query($conn, "SELECT id FROM User WHERE login='$login'");
$idUser=mysqli_fetch_assoc($idUser);
$idUser=implode($idUser);
//sprawdzic czy about jest puste, jezeli tak to zaproponowac wypelnienie
$query = mysqli_query($conn, "SELECT about FROM info WHERE foreignID='$idUser'");
$query3=mysqli_fetch_assoc($query);
$query3=implode($query3);
if (isset($_POST['about'])) {
    $getAbout = filter_input(INPUT_POST, 'about');
    $getAbout = mysqli_real_escape_string($conn, $getAbout);
    $q = mysqli_query($conn, "UPDATE info SET about='$getAbout' WHERE foreignID='$idUser'");
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
    <div>
        <h2>Hello <?=$_SESSION['login'] ?>!</h2>
        <br><br>
        <br>
        <p><?= ($query3=='') ? "Write something about you" : "About You:"?></p>
        <br>

        <p><?= ($query3=='') ?
                "<form method=\"post\" action='main.php'>
            <input type=\"text\" name=\"about\">
            <input type=\"submit\">
                </form>"
                : $query3
            ?></p>

    </div>
</center>
</body>
</html>
