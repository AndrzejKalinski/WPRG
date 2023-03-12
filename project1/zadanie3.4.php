<?php
function czypierwsza($liczba){
    for($i=2;$i<$liczba;$i++){
        if($liczba % $i == 0){
            echo "Liczba"," ",$liczba," ","nie jest pierwsza";
            echo "\n";
            echo "Ostatnia iteracja petli"," ",$i;
            break;
        }
    }
    return;
}
czypierwsza(6);