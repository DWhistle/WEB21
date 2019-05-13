<?php include_once "../header.php";
if ($_SESSION['admin'] != 2)
    error("No admin privileges");
?>
<main>
    <form action="productwork.php" method="post">
        <p>Name: <input name="name" value=""/></p>
        <p>Price: <input name="price" value=""/></p>
        <p>Desc: <input name="desk" value=""/></p>
        <p>Img: <input name="img" value=""/></p>
        <p>Category: <input name="category" value=""/></p>
        <input type="submit" name="submit" value="CREATE"/>
    </form>
</main>