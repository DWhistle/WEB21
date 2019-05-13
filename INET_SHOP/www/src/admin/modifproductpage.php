<?php include_once "../header.php";
$arr = mysqlget("SELECT * FROM `product` WHERE `id` = $_GET[modif]")[0];
if ($arr)
{
    $name = $arr['name'];
    $id = $arr['id'];
    $img = $arr['img'];
    $desk = $arr['desck'];
    $price = $arr['price'];
    $category = $arr['category'];
}
if ($_SESSION['admin'] != 2)
    error("No admin privileges");
?>
<main>
    <form action="productwork.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['modif']; ?>"/>
        <p>Name: <input name="name" value="<?php echo $name; ?>"/></p>
        <p>Price: <input name="price" value="<?php echo $price; ?>"/></p>
        <p>Desc: <input name="desk" value="<?php echo $desk; ?>"/></p>
        <p>Img: <input name="img" value="<?php echo $img; ?>"/></p>
        <p>Category: <input name="category" value="<?php echo $category; ?>"/></p>
        <input type="submit" name="submit" value="MODIF"/>
    </form>
</main>