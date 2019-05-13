<?php
include_once "$_SERVER[DOCUMENT_ROOT]/utils/error.php";

function mysqlset($msg)
{
    $link = mysqli_connect('192.168.99.100', "root", "test", "shop");
    if (!$link)
        error("Error: not connected db");
    $result = mysqli_query($link, $msg);
    echo mysqli_error($link);
    if (!$result)
        error("Error: not push db");
}
?>