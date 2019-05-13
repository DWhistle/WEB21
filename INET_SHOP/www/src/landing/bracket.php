<?php

session_start();
if ($_SESSION['loggued_on_user']){
    header("Location: ./src/bracket.html");
}
else {
    echo "you are not LogIn";
    echo "<a href='index.php'>";
}

?>
