<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-21
 * Time: 17:42
 */

$email = 'jakub@jakub.com';
$wrongEmail = 'jakuba.?sd';
$validate = filter_var($wrongEmail, FILTER_SANITIZE_ENCODED);
var_dump($wrongEmail);
echo "<br>";
var_dump($validate);
if ($wrongEmail===$validate)
    echo "same";
else echo "not same";
