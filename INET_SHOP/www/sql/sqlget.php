<?php
include_once "$_SERVER[DOCUMENT_ROOT]/utils/error.php";

function mysqlget($msg)
{
    $link = mysqli_connect('192.168.99.100', "root", "test", "shop");
    if (!$link)
        error("Error: not connected db");
    $arr = array();
    if (mysqli_multi_query($link, $msg))
    {
        do
        {
            if ($result = mysqli_store_result($link))
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $arr[] = $row;
                }
                mysqli_free_result($result);
            }
        } while (mysqli_next_result($link));
    }
    else
    {
        echo mysqli_error($link);
        error("Error: not read");
    }
    return ($arr);
}
?>