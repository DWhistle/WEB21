<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/sql/sqlset.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sql/sqlget.php";
function createcategory($name)
{
    $get = mysqlget("SELECT `name` FROM `category` WHERE `name` = '$name'")[0]['name'];
    if ($get == $name)
        return ;
    mysqlset("INSERT INTO `category` (`id`, `name`) VALUES (NULL, '$name')");
}

function delcategory($id)
{
    $get = mysqlget("SELECT `id` FROM `category` WHERE `id` = '$id'")[0]['id'];
    if ($get && $get === $id)
        mysqlset("DELETE FROM `category` WHERE `id` = '$id'");
}

function editcategory($id, $name)
{
    if (!isset($name) || $name == '')
        $name = 'category';
    mysqlset("UPDATE `category` SET `id`=`id`,`name`='$name' WHERE `id` = '$id'");
}

$id = $_POST['del'];
$name = $_POST['name'];

if ($_POST['submit'] && $_POST['submit'] == 'CREATE')
    createcategory($name);
else if ($_POST['del'] && $_POST['del'] !== '')
    delcategory($id);
else if ($_POST['submit'] && $_POST['submit'] == 'MODIF')
    editcategory($_POST['id'], $_POST['name']);
header("Location: ../src/admin/admin.php");
?>