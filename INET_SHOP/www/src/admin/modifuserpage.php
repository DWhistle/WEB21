<?php include_once "../header.php";
if ($_GET['modif'] && $_GET['modif'] !== '')
{
    $arr = mysqlget("SELECT * FROM `user` WHERE `id` = $_GET[modif]")[0];
    if ($arr)
    {
        $name = $arr['name'];
        $id = $arr['id'];
        $phone = $arr['phone'];
        $per = $arr['per'];
        $mail = $arr['mail'];
        $address = $arr['Address'];
    }
}
?>
<main>
    <form action="user.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['modif']; ?>"/>
        <p>Username: <input name="login" value="<?php echo $name; ?>"/></p>
        <?php if ($_SESSION['admin'] != 2)
        {
        ?>
        <p>Old password: <input name="oldpw" value=""/></p>
        <?php
        }
        ?>
        <p>New password: <input name="pw" value=""/></p>
        <?php if ($_SESSION['admin'] == 2)
        {
        ?>
        <p>Per: <input name="per" value="<?php echo $per; ?>"/></p>
        <?php
        }
        ?>

        <p>Phone: <input name="phone" value="<?php echo $phone; ?>"/></p>
        <p>Mail: <input name="mail" value="<?php echo $mail; ?>"/></p>
        <p>Address: <input name="address" value="<?php echo $address; ?>"/></p>
        <input type="submit" name="submit" value="MODIF"/>
    </form>
</main>