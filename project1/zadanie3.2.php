<?php
function kostka($rzuty)
{
    $tablica=[];
    for($i=1;$i<=$rzuty;$i++){
        $tablica[$i]=rand(1, 6);
    }
    foreach($tablica as $i){
        echo $i,",";
    }
    return;
}
echo kostka(3);




