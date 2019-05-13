<?php
function error($msg)
{
    echo $msg."\n";
    echo "<form action=\"../landing/index.php\">";
    echo "<button> Home </button>";
    echo "</form>";
    exit;
}

function errorredirect($msg, $link, $method = "GET", $name = "", $value = "")
{
    echo $msg."\n";
    echo "<form action=\"../landing/index.php\">";
    echo "<button> Home </button>";
    echo "</form>";
    echo "<form method=\"$method\" action=\"$link\">";
    echo "<button type=\"submit\" name=\"$name\" value=\"$value\"> Back </button>";
    echo "</form>";
    exit();
}
?>