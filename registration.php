<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 10:16
 */


if (isset($_SESSION['login']))
{
    header("Location: main.php");
    exit();
}
if (isset($_POST['login'])) {
    session_start();

   require_once "dbConn.php";

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

    $checkTable = mysqli_query($conn, "SELECT login FROM User WHERE login='$login'");
    $numLog = mysqli_num_rows($checkTable);

    if (($login != $_POST['login']) || ($numLog > 0) || (strlen($login) < 4) || (strlen($login) > 20)) {
        $_SESSION['error'] = "Wrong Login!";
        header("Location: signUp.php");
        exit();
    }
    $filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    $checkTable = mysqli_query($conn, "SELECT email FROM User WHERE email='$email'");
    $numLog = mysqli_num_rows($checkTable);

    if (($filterEmail != $email) || ($filterEmail == false) || ($numLog > 0)) {
        $_SESSION['error'] = "Wrong E-mail!";
        header("Location: signUp.php");
        exit();
    }

    $sanitizePwd = filter_var($pwd, FILTER_SANITIZE_ENCODED);
    if (($pwd != $pwd2) || strlen($pwd) < 6 || $pwd != $sanitizePwd) {
        $_SESSION['error'] = "Wrong Password(s)!";
        header("Location: signUp.php");
        exit();
    }

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "INSERT INTO User VALUES (NULL, '$login', '$email', '$pwd')");
    $u = mysqli_insert_id($conn);


    $id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM User WHERE login='$login'"));
    $id = $id['id'];

    $query = mysqli_query($conn, "INSERT INTO info VALUES (NULL, '$id', '', '', '')");

    $_SESSION['success']="Successful registration!";

    header("Location: signIn.php");
}
else
    header("Location: signUp.php");
