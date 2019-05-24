<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-23
 * Time: 10:54
 */

session_start();
require_once 'dbConn.php';

$login = filter_input(INPUT_GET, 'login');
//zamien login na foreignID z tabeli info
$query="SELECT id FROM User WHERE login='$login'";
$idUser= mysqli_query($conn, $query);
$idUser=mysqli_fetch_assoc($idUser);
$idUser=$idUser['id'];

$query = mysqli_query($conn, "SELECT about FROM info WHERE foreignID='$idUser'");
$about=mysqli_fetch_assoc($query);
$about=$about['about'];

$posts= mysqli_query($conn, "select posts from info where foreignID='$idUser'");
$posts=mysqli_fetch_assoc($posts);

if ($posts!='')
{
    $posts = implode($posts);
    $posts = explode(';', $posts);
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>liberFacies - <?= $login?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
</head>
<body>
<a href="main.php">My profile!</a><br>
<center>
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
    <p><?=//TODO edytowanie aboutow
        ($about=='') ? "<b>About</b>: <br><br>Nothing to display:(" : "<b>About $login:</b>"?></p>
    <br>

    <p><?= ($about=='') ?
            ''
            : $about
        ?></p>
    <br><br>
    <p>
        <b>Serious thoughts:</b>
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
            echo "Nothing to display:(";
        ?>
    </p>


</center>
</body>
</html>