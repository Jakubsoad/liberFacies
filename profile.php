<?php
/**
 * Created by PhpStorm.
 * User: mroz
 * Date: 2019-05-23
 * Time: 10:54
 */

session_start();

$a = filter_input(INPUT_POST, 'profile');
var_dump($a);