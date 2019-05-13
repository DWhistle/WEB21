<?php
$ret = array();
$lines = fopen('list.csv', 'r');
$line = "";
while ($line = fgets($lines))
{
    array_push($ret, $line);
}
echo json_encode($ret);