<?php
if (!isset($_COOKIE['counter'])){
    $counter = 1;
    setcookie('counter', $counter, time()+60*60*24*30);
    }
    else{
    $counter = $_COOKIE['counter']+1;
    setcookie('counter', $counter, time()+60*60*24*30);
    }
    echo $counter;

if ($counter == 10){
    echo "info";
}
?>