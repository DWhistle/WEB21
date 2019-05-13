<?php
include_once "$_SERVER[DOCUMENT_ROOT]/utils/error.php";
include_once "$_SERVER[DOCUMENT_ROOT]/product/getcategory.php";
include_once "$_SERVER[DOCUMENT_ROOT]/product/product.php";
$id = $_POST['del'];
$name = $_POST['name'];
$price = $_POST['price'];
$img = $_POST['img'];
$desk = $_POST['desk'];
$category = $_POST['category'];

if ($_POST['submit'] && $_POST['submit'] == 'MODIF')
{
    if (preg_match('/^[0-9 ]+$/', $category))
        editproduct($_POST['id'], $name, $desk, $img, $category, $price);
    else
        errorredirect("Error", "modifproductpage.php", "GET", "modif", $_POST['id']);
}
if ($_POST['del'] && $_POST['del'] !== '')
    delproduct($id);
if ($_POST['submit'] && $_POST['submit'] == "CREATE")
{
    if (preg_match('/^[0-9 ]+$/', $category))
    {
        $split = splitcategory($category);
        addproduct($name, $desk, $img, $split, $price);
    }
    else
        errorredirect("Error", "createproductpage.php", "GET", "modif", $_POST['id']);
}
header("Location: admin.php");
?>