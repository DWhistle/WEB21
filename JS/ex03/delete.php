<?php

$file = fopen("list.csv", "r");
$data = array();
while (($line = fgetcsv($file)) !== FALSE)
{
    array_push($data ,$line);
}
foreach ($data as $dat){
    if ($dat == $_POST['task'])
        $contents = str_replace($dat, '', $file);
}
