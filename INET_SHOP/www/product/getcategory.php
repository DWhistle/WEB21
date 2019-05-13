<?php
include_once "$_SERVER[DOCUMENT_ROOT]/sql/sqlget.php";
include_once "$_SERVER[DOCUMENT_ROOT]/utils/ft_split.php";

function getcategory($id)
{
    if ($id >= 0)
    {
        $category = mysqlget("SELECT `name` FROM `category` WHERE `id` = $id")[0]['name'];
        if ($category != '')
            return ($category);
        else
            return "Error";
    }
    else
        error("Error");
    return ($category);
}

function splitcategory($category)
{
    $arr = ft_split($category);
    return ($arr);
}

function findallproductcategory($idcategory)
{
    $res = mysqlget("SELECT * FROM `product` WHERE `id` = '$idcategory'");
    return ($res);
}
?>