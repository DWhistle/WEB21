<?php
session_start();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="cart.css">
	<title>Bill</title>
</head>
<body>
<?php
if (!$_SESSION['loggued_on_user'] || $_POST['buy'] !== 'OK')
{
    echo "<script type='text/javascript'>alert('You are not logged');</script>";
    ?>
    <a href="../landing/index.php">Home</a>
<?php
    exit();
}

if (!$_SESSION['cart'])
{
    echo "<script type='text/javascript'>alert('Buy something, bitch');</script>";
    ?>
    <a href="../landing/index.php">Home</a>
    <?php
    exit();
}

$name = $_SESSION['loggued_on_user'];
$cart = $_SESSION['cart'];
$path = "$_SERVER[DOCUMENT_ROOT]/src/data/cart";
chmod($path, 0777);
if (file_exists($path)) {
    $data = file_get_contents($path);
    $data = unserialize($data);
}

$data[$name] = $cart;
file_put_contents($path, serialize($data));
$_SESSION['cart'] = null;
echo "<script type='text/javascript'>alert('Order is confirmed, bitch');</script>";
?>
<a href="../landing/index.php">Home</a>

<div>

	<table class="checkout_table">
		<thead>
			<tr>
				<th>Buyer: "<?php echo $name ?>"</th>
				<th></th>
				<th></th>
				<th>Seller: LLC "OldFuck"</th>
			</tr>


	        <tr>
		        <th>Name</th>
		        <th>Amount</th>
		        <th>Price</th>
		        <th>Sum</th>
	        </tr>
		<hr>
		</thead>

        <?php
        foreach($cart as $product)
        {
            ?>
			<tr class="">
				<td class=""><?php echo $product['name'];?></td>
				<td class=""><?php echo $product['amount'];?></td>
				<td class=""><?php echo $product['price'];?></td>
				<td class=""><?php echo $product['amount'] * $product['price'];?></td>
			</tr>
            <?php
        }
        ?>
		<tr><td colspan="4" style="text-align: right">Total: <?php $total = 0; foreach ($cart as $item){$total += $item['price']*$item['amount'];}; echo $total;?></td>
		</tr>
	</table>
</div>
</body>
</html>
