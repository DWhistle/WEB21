<?php include_once "../header.php";?>
<?php
    session_start();
    include_once ("../header.php");
    if ($_POST['del']){
        unset($_SESSION['cart'][$_POST['del']]);
    }
    if ($_POST['incr']){
        $id = $_POST['incr'];
        $_SESSION['cart'][$id]['amount']++;
    }
    if ($_POST['decr']){
        $id = $_POST['decr'];
        $amount = $_SESSION['cart'][$id]['amount'];
        $amount--;
        if ($amount < 0)
            $amount = 0;
        $_SESSION['cart'][$id]['amount'] = $amount;

    }
    ?>

<html><body style="background-color: bisque">
<link rel="stylesheet" href="cart.css">

<main>

    <div class="container cart" style="">
        <div class="good">
                <p>Image</p>
        </div>
        <div class="good">
                <p>Name</p>
        </div>
        <div class="good">
                <p>Amount</p>
        </div>
        <div class="good">
                <p>Price</p>
        </div>
        <div class="good">
            <p>Sum of Item</p>
        </div>
        <div class="">
            <p></p>
        </div>


   <?php

    $all =  $_SESSION['cart'];
    if (!$all)
        return ;
    foreach ($all as $item){
        ?>

        <div class="good">
            <img src="<?php echo $item['img']; ?>">
        </div>

        <div class="good">
            <p><?php echo $item['name']; ?></p>
        </div>

        <div class="good">
            <p><?php echo $item['amount']; ?></p>
        </div>

        <div class="good">
            <p><?php echo $item['price']; ?></p>
        </div>

        <div class="good">
            <p><?php echo $item['price']*$item['amount']; ?></p>
        </div>

<!--        add-->
        <div class="good" style="background-color: rgba(0,0,0,0); border-bottom: 3px dotted white; border-radius: 0.5px; border-left: 0; border-right: 0; border-top: 0" >
            <form method="post">
                <div style="text-align: center">
                    <button type="submit" name="incr" value="<?php echo $item['id'];?>">
                        <b>+</b>
                    </button>
                </div>
            </form>
            <form method="post">
                <div style="text-align: center">
                    <button type="submit" name="decr" value="<?php echo $item['id'];?>">
                        <b>-</b>
                    </button>
                </div>
            </form>
            <form method="post">
                <div style="text-align: center">
                    <button type="submit" name="del" value="<?php echo $item['id'];?>">
                        <b>Delete</b>
                    </button>
                </div>
            </form>

        </div>

        <?php
    }
    ?>

        <div class="good">
            <form method="post" action="checkout.php">
                <div style="text-align: center">
                    <button type="submit" name="buy" value="OK" style="margin-top: 5px; border: 0">
                        <b>Checkout</b>
                    </button>
                </div>
            </form>
        </div>

	    <div></div>
	    <div></div>
	    <div></div>
	    <div></div>

	    <div style="padding-top: 1.5vw" class="good"><b>Total: <?php $total = 0; foreach ($all as $item){$total += $item['price']*$item['amount'];}; echo $total;?></b></div>
    </div>

</main>
</body>
</html>
