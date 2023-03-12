<?php
function tablica($a)
{
    $tablica = [];
    for ($i = 1; $i < 5; $i++) {
        $tablica[$i] = rand(1, 9);
    }
    for($i=1;$i<5;$i++){
        echo $tablica[$i],"\n";
    }

    return $tablica[$a];
}
echo tablica(2);
?>