<?php include_once "../header.php"; ?>
<main>
    <form action="user.php" method="post">
        <p>Username: <input name="login" value=""/></p>
        <p>Password: <input name="pw" value=""/></p>
        <?php
        if ($_SESSION['admin'] == 2)
        {
        ?>
        <p>Per: <input name="per" value=""/></p>
        <?php
        }
        ?>
        <p>Phone: <input name="phone" value=""/></p>
        <p>Mail: <input name="mail" value=""/></p>
        <p>Address: <input name="address" value=""/></p>
        <input type="submit" name="submit" value="CREATE"/>
    </form>
</main>