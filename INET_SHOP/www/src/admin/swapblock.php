<?php
session_start();
$submit = $_POST['submit'];
switch ($submit)
{
    case "USER":
        $_SESSION['adminmenu'] = 0;
        break;
    case "PRODUCT":
        $_SESSION['adminmenu'] = 1;
        break;
    case "CATEGORY":
        $_SESSION['adminmenu'] = 2;
        break;
    case "ORDERS":
        $_SESSION['adminmenu'] = 3;
        break;
    default:
        break;
}
header("Location: admin.php");
?>