<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/sql/sqlset.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sql/sqlget.php";

function modifuser($id, $newname, $oldpw, $passwd, $per, $phone, $mail, $address)
{
    $findid = 0;
    if (isset($id) && $id !== '')
    {
        $get = mysqlget("SELECT * FROM `user` WHERE `id` = '$id'")[0];
        $findid = 1;
    }
    else
        $get = mysqlget("SELECT * FROM `user` WHERE `name` = '$newname'")[0];
    if (!isset($get))
        error("Error: not valid login or password");
    if ($_SESSION['admin'] == 1 && !isset($oldpw) && hash('Whirlpool', $oldpw) !== $get['passwd'])
        errorredirect("Error", "modifproductpage.php", "GET", "modif", $get['id']);

    if (!isset($newname) || $newname == '')
        $newname = $get['name'];

    if (!isset($passwd) || $passwd == '')
        $passwd = $get['passwd'];
    else
        $passwd = hash('Whirlpool', $passwd);

    if (!isset($per) || $per == '')
        $per = $get['per'];
    if (!isset($phone) || $phone == '')
        $phone = $get['phone'];
    if (!isset($mail) || $mail == '')
        $mail = $get['mail'];
    if (!isset($address) || $address == '')
        $address = $get['Address'];

    if ($findid == 1)
        mysqlset("UPDATE `user` SET `id`=`id`, `name`='$newname', `passwd`='$passwd', `per`='$per',
        `phone`='$phone', `mail`='$mail', `Address`='$address' WHERE `id` = '$id'");
    else
        mysqlset("UPDATE `user` SET `id`=`id`, `name`='$newname', `passwd`='$passwd', `per`='$per',
        `phone`='$phone', `mail`='$mail', `Address`='$address' WHERE `name` = '$newname'");
}

function deluser($id)
{
    $get = mysqlget("SELECT `id` FROM `user` WHERE `id` = '$id'")[0]['id'];
    if ($get && $get === $id)
    {
        $name = mysqlget("SELECT `name` FROM `user` WHERE `id` = '$id'")[0]['name'];
        mysqlset("DELETE FROM `user` WHERE `id` = '$id'");
        if ($_SESSION['loggued_on_user'] == $name)
        {
            $_SESSION['loggued_on_user'] = '';
            $_SESSION['admin'] = 1;
            header("Location: ../landing/index.php");
        }
        else
            header("Location: admin.php");
    }
}

function createuser($name, $passwd, $per, $phone, $mail, $address)
{
    $get = mysqlget("SELECT `name` FROM `user` WHERE `name` = '$name'")[0]['name'];
    if ($get == $name)
        return ;
    if ($per < 1 || $per > 2)
        $per = 1;
    if (!isset($per) || $per == '' || !is_numeric($per))
        $per = 1;
    $passwd = hash('Whirlpool', $passwd);
    mysqlset("INSERT INTO `user` (`id`, `name`, `passwd`, `per`, `phone`, `mail`, `address`) VALUES
    (NULL, '$name', '$passwd', '$per', '$phone', '$mail', '$address')");
}

$id = $_POST['id'];
$newlogin = $_POST['login'];
$passwd = $_POST['pw'];
$oldpw = $_POST['oldpw'];
$per = $_POST['per'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$address = $_POST['address'];

if ($_POST['submit'] && $_POST['submit'] == 'MODIF')
{
    modifuser($id, $newlogin, $oldpw, $passwd, $per, $phone, $mail, $address);
    if ($_SESSION['admin'] == 2)
        header("Location: admin.php");
    else
        header("Location: ../landing/index.php");
}
if ($_POST['del'] && $_POST['del'] !== '')
    deluser($_POST['del']);
if ($_POST['submit'] && $_POST['submit'] == 'CREATE')
{
    createuser($newlogin, $passwd, $per, $phone, $mail, $address);
    if ($_SESSION['admin'] == 2)
        header("Location: admin.php");
    else
        header("Location: ../landing/index.php");
}
?>