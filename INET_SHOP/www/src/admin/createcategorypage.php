<?php include_once "../header.php";
if ($_SESSION['admin'] != 2)
    error("No admin privileges");
?>
<main>
    <form action="../../product/category.php" method="post">
        <p>Name: <input name="name" value=""/></p>
        <input type="submit" name="submit" value="CREATE"/>
    </form>
</main>