<?php

include_once 'auth.php';

$login = $_POST['login'];
$passwd = $_POST['passwd'];

session_start();

if (auth($login, $passwd)){
    $_SESSION['loggued_on_user'] = $login;
    $get = mysqlget("SELECT `per` FROM `user` WHERE `name` = '$login'")[0]['per'];
    $_SESSION['admin'] = $get;
    header("Location: /index.php");
}
else {
    $_SESSION['loggued_on_user'] = '';
    $_SESSION['admin'] = 1;
    $_SESSION['adminmenu'] = null;
    header("Location: /index.php");
}

?>