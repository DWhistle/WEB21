<?php
include_once "../header.php";
if ($_SESSION['admin'] != 2)
    error("No admin privileges");
?>
<main>
    <div >
        <form action="swapblock.php" method="POST">
        <button class="categories"type="submit" name="submit" value="USER"> USER </button><br>
        <button class="categories"type="submit" name="submit" value="PRODUCT"> PRODUCT </button><br>
        <button class="categories"type="submit" name="submit" value="CATEGORY"> CATEGORY </button><br>
        <button class="categories"type="submit" name="submit" value="ORDERS"> ORDERS </button>
        </form>
    </div>
    <?php
    if ($_SESSION['adminmenu'] == 2)
    {
        $all = mysqlget("SELECT * FROM `category`");
    ?>
    <div>
        <form action="createcategorypage.php">
            <button class="categories" style="background-color: darkcyan"type="submit"> CREATE </button>
        </form>
    </div>
        <div class="container main">
        <?php
        foreach ($all as $item)
        {
        ?>
            <div class="good">
                <div>
                    <p>id: <?php echo $item['id'];?></p>
                    <p>name: <?php echo $item['name'];?></p>
                    <div>
                        <form method="post" action="../../product/category.php">
                            <button type="submit" name="del" value="<?php echo $item['id'];?>">
                                <b>Delete</b>
                            </button>
                        </form>
                        <form method="get" action="modifcategorypage.php">
                            <button type="submit" name="modif" value="<?php echo $item['id'];?>">
                                <b>Modify</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
    <?php
    }
    else if ($_SESSION['adminmenu'] == 1)
    {
        $all = mysqlget("SELECT * FROM `product`");
    ?>
    <div>
        <form action="createproductpage.php">
            <button class="categories" style="background-color: darkcyan" type="submit"> CREATE </button>
        </form>
    </div>
        <div class="container main">
        <?php

        foreach ($all as $item)
        {
        ?>
            <div class="good">
                <div>
                    <p>Name: <?php echo $item['name'];?></p>
                    <p>Price: <?php echo $item['price'];?></p>
                    <div>
                        <img src="<?php echo $item['img'];?>">
                    </div>
                    <span>Description: <?php echo $item['desck'];?></span>
                    <span>Category: <?php
                    foreach (splitcategory($item['category']) as $i)
                    {
                        echo getcategory($i);
                        echo " ";
                    }
                    ?></span>
                    <div>
                        <form method="post" action="productwork.php">
                            <button type="submit" name="del" value="<?php echo $item['id'];?>">
                                <b>Delete</b>
                            </button>
                        </form>
                        <form method="get" action="modifproductpage.php">
                            <button type="submit" name="modif" value="<?php echo $item['id'];?>">
                                <b>Modify</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        </div>
    <?php
    }
    else if ($_SESSION['adminmenu'] == 3)
    {
    $users = unserialize(file_get_contents("$_SERVER[DOCUMENT_ROOT]/src/data/cart"));
        ?>
	    <table class="orders-table">
		    <thead class="orders">
            <th>Item's id</th>
            <th>Item's name</th>
            <th>Amount</th>
            <th>Price per each</th>
            <th>Overall price</th>
            <?php
            if ($users)
            foreach ($users as $name => $cart)
            {
            	echo "<tr class='orders'><th class='orders'>User: ";
	            echo $name;
	            echo "</th></tr>";
                foreach($cart as $product)
                {
                ?>
	                <tr class="orders">

                        <td class="" style="text-align: center"><?php echo $product['id'];?></td>
                        <td class=""><?php echo $product['name'];?> </td>
                        <td class=""><?php echo $product['amount'];?></td>
                        <td class=""><?php echo $product['price'];?></td>
                        <td class=""><?php echo $product['amount'] * $product['price'];?></td>
	                </tr>
	                <?php
                }
            	?>

                <?php
            }
            ?>
		    </thead>
	    </table>
        <?php
    }
    else
    {
        $all = mysqlget("SELECT * FROM `user`");
    ?>
    <div>
        <form action="createuserpaga.php">
            <button class="categories"style="background-color: darkcyan" type="submit"> CREATE </button>
        </form>
    </div>
        <div class="container main">
        <?php
        foreach ($all as $item)
        {
        ?>
            <div class="good">
                <div>
                    <p>Name: <?php echo $item['name'];?></p>
                    <span>Permissions: <?php echo $item['per'];?></span>
                    <div>
                        <form method="post" action="user.php">
                            <button type="submit" name="del" value="<?php echo $item['id'];?>">
                                <b>Delete</b>
                            </button>
                        </form>
                        <form method="get" action="modifuserpage.php">
                            <button type="submit" name="modif" value="<?php echo $item['id'];?>">
                                <b>Modify</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
    <?php
    }
    ?>

</main>