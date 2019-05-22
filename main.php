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
else
{
    echo "Hello ";
    echo $_SESSION['login'] . "!";
}