<?php
function tabliczkamnozenia($liczba){
    $mnoznik=1;
    for($i=1;$i<$liczba+1;$i++){
        for($y=1;$y<11;$y++){
            echo $mnoznik*$y," ";
        }
        $mnoznik++;
        echo "\n";
    }
}
tabliczkamnozenia(10);