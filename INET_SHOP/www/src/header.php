<?php
session_start();
include_once "$_SERVER[DOCUMENT_ROOT]/sql/sqlget.php";
include_once "$_SERVER[DOCUMENT_ROOT]/product/getcategory.php";
include_once "$_SERVER[DOCUMENT_ROOT]/product/product.php";

if ($_POST['item'])
{
    $arr = unserialize($_POST['item']);
    $arr['amount'] = 1;
    $_SESSION['cart'][$arr['id']] = $arr;
}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Shop</title>
	<link rel="stylesheet" href="../landing/style.css">
	<link rel="stylesheet" href="../landing/main.css">
</head>
<body style="background-color: antiquewhite">
<header>
    <div class="container head">

        <div >

            <a href="../../index.php"><p style="font-size:2vw; color: white"><b>Online Shop</b></p></a>
        </div>
        <?php
        if ($_SESSION['admin'] == 2)
        {
        ?>
        <div>
            <a href="../admin/admin.php"><p style="font-size:2vw; color: white"><b>adminPanel</b></p></a>
        </div>
        <?php
        }
        else

        {
            ?>
			<div>
				<p></p>
			</div>
            <?php
        }
        ?>

    <?php
    if ($_SESSION['loggued_on_user'] == '')
    {
    ?>
    <!--        sign in-->
    <div class="dropdown" style="text-align: center; margin-top: 2vw; font-size: 1vw">
        <button class="dropbutton"><b>SignIn</b></button>
        <div class="content" id="form1">
            <form method="post" action="../landing/login.php">
                Username: <input  name="login" value=""><br>
                Password: <input name="passwd" value=""><br>
                <input type="submit" name="signin" style="font-size: 1vw" value="OK">
            </form>
            <a style="background-color: whitesmoke; margin-bottom: 0; max-width: 9vw;  border: 0.1vw solid darkgrey; border-radius: 0.3vw" href="../admin/modifuserpage.php">Change password</a>
            <a style="background-color: whitesmoke; padding: 0; display: block; max-width: 3.5vw; margin-bottom: 0.5vw; border: 0.1vw solid darkgrey; border-radius: 0.3vw" href="../admin/createuserpaga.php">SignUp</a>

        </div>
    </div>

        <?php
        }
        else {
           ?>
            <div style="font-size:2vw; ">
                <p> You logged as <span style="color: darkred; "> <?php
                $str = $_SESSION['loggued_on_user'];
                if (strlen($str) > 25)
                {
                    $str = substr($str, 0, 25);
                    echo $str."...";
                }
                else
                    echo $str;
                ?></span></p>
            </div>
        <?php } ?>
		<!--                log out-->
		<div class="dropdown">
			<form method="post" action="../landing/logout.php">
				<div style="text-align: center; margin-top: 2vw">
					<button class="dropbutton" type="submit" name="logout" value="OK">
						<b>LogOut</b>
					</button>
				</div>
			</form>
		</div>

		<!--        bracket-->
		<div id="backet">
			<a href="../cart/cart.php">
				<img width="20%" style="margin-left: 8vw"
				     src="https://cdn.pixabay.com/photo/2016/12/12/13/23/shopping-cart-1901584__340.png">
			</a>
		</div>

	</div>
</header>
