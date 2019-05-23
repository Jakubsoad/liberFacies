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
$idUser=$idUser['id'];
//sprawdzic czy about jest puste, jezeli tak to zaproponowac wypelnienie
$query = mysqli_query($conn, "SELECT about FROM info WHERE foreignID='$idUser'");
$about=mysqli_fetch_assoc($query);
$about=$about['about'];

if (isset($_POST['about'])) {
    $getAbout = filter_input(INPUT_POST, 'about');
    $getAbout = mysqli_real_escape_string($conn, $getAbout);
    $q = mysqli_query($conn, "UPDATE info SET about='$getAbout' WHERE foreignID='$idUser'");
    echo "<meta http-equiv='refresh' content='0'>";
}

//odebranie posta i schowanie go do bazy
if (isset($_POST['post']))
{
    $post = filter_input(INPUT_POST, 'post');
    $post=mysqli_real_escape_string($conn, $post);
    $queryAddPost = mysqli_query($conn, "UPDATE info SET posts =concat(posts, '$post', ';') WHERE foreignID='$idUser'");
    echo "<meta http-equiv='refresh' content='0'>";
}
//wyjęcie postów i wyświetlenie ich
$posts= mysqli_query($conn, "select posts from info where foreignID='$idUser'");
$posts=mysqli_fetch_assoc($posts);

if ($posts!='')
{
    $posts = implode($posts);
    $posts = explode(';', $posts);
}



//TODO szukanie znajomych
//TODO dodawanie znajomych
//TODO wyswietlanie profilu innych osob
//TODO dodawanie zdjec

?>
<!DOCTYPE html>
<html>
<head>
    <title>liberFacies - Your site</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
</head>
<body>
<a href="logout.php">Logout!</a><br>
<center>
        <h2>Hello <?=$_SESSION['login'] ?>!</h2>
        <br><br>
    Search for friends!
        <form action="search.php" method="post">
            <input type="text" name="friend" placeholder="login/e-mail of Your friend!">
            <br>
            <input type="submit">
        </form>
    <?php if (isset($_SESSION['friend'])) {
        echo $_SESSION['friend'];
        unset($_SESSION['friend']);
    }
    ?>
        <br>
        <p><?=//TODO kasowanie i edytowanie aboutow
            ($about=='') ? "Write something about you" : "About You:"?></p>
        <br>

        <p><?= ($about=='') ?
                "<form method=\"post\" action='main.php'>
            <input type=\"text\" name=\"about\">
            <input type=\"submit\">
                </form>"
                : $about
            ?></p>
    <br><br>
    <p>
        What are You thinking about?
        <form action="main.php" method="post">
        <input type="text" name="post">
        <input type="submit">
    </form>
    </p>
    <p>
        <?php
        //TODO kasowanie i edytowanie postow
        if ($posts!="") {
        $counter=1;
        foreach ($posts as $p)
        {
            if ($p!='') {
                echo "<p>$counter. $p</p><br>";
                $counter++;
            }
        }

        }
        else
            echo "Nothing to display! Write something :)";
        ?>
    </p>


</center>
</body>
</html>
