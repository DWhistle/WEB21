<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sql/sqlset.php";

$login = $_POST['login'];
$passwd = $_POST['passwd'];
$ok = $_POST['signup'];

//check
if ($ok !== "OK" || !$login || !$passwd){
    header("Location: /index.php");
    exit();
}
$passwd = hash('Whirlpool', $passwd);
mysqlset("INSERT INTO `user` (`id`, `name`, `passwd`, `per`) VALUES (NULL, '$login', '$passwd', '1')");
header("Location: /index.php");
?>
