<?php

    $file = fopen("list.csv", "a+");
    $task = $_POST['id'].$_POST['task'];
    fwrite($file, $_POST['task'] . "\n");
    fclose($file);