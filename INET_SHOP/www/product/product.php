<?php
include_once "$_SERVER[DOCUMENT_ROOT]/sql/sqlset.php";
include_once "$_SERVER[DOCUMENT_ROOT]/sql/sqlget.php";

function addproduct($name, $disk, $image = NULL, $category, $price)
{
    $get = mysqlget("SELECT `name` FROM `product` WHERE `name` = '$name'")[0]['name'];
    echo "$get";
    if ($get == $name)
        return ;
    if (!isset($name) || $name == '')
        $name = "product";
    if (!isset($disk) || $name == '')
        $disk = "disk";
    if (!isset($image) || $image == '')
        $image = "https://via.placeholder.com/200x150?text=42shop";
    if (isset($category))
    {
        $str = '';
        foreach($category as $item)
        {
            if (!is_numeric($item) && $item < 0)
                $item = 0;
        }
        $str = implode(" ", $category);
    }
    if (!isset($price) || !is_numeric($price) || $price < 0)
        $price = 0;
    mysqlset("INSERT INTO `product` (`id`, `img`, `desck`, `price`, `name`, `category`)
        VALUES (NULL, '$image', '$disk', '$price', '$name', '$str')");
}

function editproduct($id, $name, $disk, $image, $category, $price)
{
    $get = mysqlget("SELECT * FROM `product` WHERE `id`='$id'")[0];
    if (!isset($name) || $name == '')
        $name = $get['name'];
    if (!isset($disk) || $disk == '')
        $disk = $get['desck'];
    if (!isset($image) || $image == '')
        $image = $get['img'];
    if (!isset($category) || $category == '')
        $category = $get['category'];
    else
    {
        if (isset($category))
        {
            $str = '';
            if (is_array($category))
            {
                foreach($category as $item)
                {
                    if (!is_numeric($item) && $item < 0)
                        $item = 0;
                }
                $str = implode(" ", $category);
            }
            else
                $str = $category;
        }
    }
    if (!isset($price) || !is_numeric($price) || $price < 0)
        $price = $get['price'];
    mysqlset("UPDATE `product` SET `id`='$id',`img`='$image',`desck`='$disk',
    `price`='$price',`name`='$name',`category`='$category' WHERE `id` = '$id'");
}

function delproduct($id)
{
    $find = 0;

    $get = mysqlget("SELECT `id` FROM `product` WHERE 1");
    foreach($get as $item)
    {
        if ($item['id'] == $id)
            $find++;
    }
    if ($find > 0)
        mysqlset("DELETE FROM `product` WHERE `id` = '$id'");
    else
        error("Error: del product");
}
?>