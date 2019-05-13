<?php
include  "$_SERVER[DOCUMENT_ROOT]/sql/sqlget.php";

function auth($login, $passwd){

    if (!$login || !$passwd) {
        return false;
    }
    $q = mysqlget("SELECT * FROM `user`");
    for ($i = 0; $i < count($q); $i++){
        if ($q[$i]['name'] === $login){
            if ($q[$i]['passwd'] === hash('Whirlpool', $passwd)){
                return (true);
            }
            else {
                return (false);
            }
        }
    }
    return (false);
}

?>