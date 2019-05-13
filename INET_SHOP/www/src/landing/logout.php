<?php
session_start();

if ($_POST['logout'] === 'OK'){
    $_SESSION['loggued_on_user'] = '';
    $_SESSION['admin'] = 1;
    $_SESSION['adminmenu'] = null;
    $_SESSION['cart'] = null;
}
header('Location: index.php');
exit;
?>