<?php include_once "../header.php";
$arr = mysqlget("SELECT * FROM `category` WHERE `id` = $_GET[modif]")[0];
if ($arr)
    $name = $arr['name'];
if ($_SESSION['admin'] != 2)
    error("No admin privileges");
?>
<main>
    <form action="../../product/category.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['modif']; ?>"/>
        <p>Name: <input name="name" value="<?php echo $name; ?>"/></p>
        <input type="submit" name="submit" value="MODIF"/>
    </form>
</main>