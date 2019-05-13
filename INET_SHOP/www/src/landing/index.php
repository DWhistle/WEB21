<?php include_once "../header.php";?>
<main>
    <?php
    if ($_POST['cat'] === 'OK'){
    	$chosen_cats = $_POST;
        unset($chosen_cats['cat']);
    }
    $all = mysqlget("SELECT * FROM `product`");
    $cat_id_arr = mysqlget("SELECT `id` FROM `category`");
    ?>

	<form method="post" action="" style="float: left;">
		<div style="background-color: antiquewhite; width: 10vw; border-radius: 4px; min-width: 150px; "><b style="text-align: center">Search by Category</b>

		<?php
		foreach ($cat_id_arr as $item){
			$cat_name = getcategory($item['id']);
		?>
		<div class="categories" ><input type="checkbox" name="<?php echo $cat_name;?>" value="<?php echo $cat_name;?>"><?php echo $cat_name?></div>

		<?php
		}
		?>

            <input  type="submit" name="cat" style="width: 60px; margin-left: 1vw" value="OK">
		</div>

	</form>

    <div class="container main">
        <?php

        foreach ($all as $item)
        {
			$cats_of_item = preg_split('/\s+/', $item['category']);
            $was_printed = 0;
            foreach ($cats_of_item as $cat) {
                $cat = getcategory($cat);
                if ($was_printed == 0 && (!$chosen_cats || in_array($cat, $chosen_cats))) {
                    $was_printed = 1;
                    ?>
		            <div class="good">
			            <div>
				            <p><?php echo $item['name']; ?></p>
				            <p>Price: <?php echo $item['price']; ?> RUB</p>
			            </div>
			            <div>
				            <img src="<?php echo $item['img']; ?>">
			            </div>
			            <div >
				            <span><?php echo $item['desck']; ?></span> <br>
				            <div>
					            <form method="post">
						            <div style="text-align: center">
							            <button type="submit" name="item" value='<?php echo serialize($item); ?>'>
								            <b>Add to Cart</b>
							            </button>
						            </div>
					            </form>
				            </div>

			            </div>
		            </div>
                    <?php
                }
            }
        }
        ?>

    </div>

</main>


</body>
</html>