<?php

$tablica=[];
if (!$fd = fopen("C:\Users\andrz\PhpstormProjects\project4\odczyt.txt",'r')) {
    echo "nie ma pliku";
}
else {

    for($i=0;$i<5;$i++){
        $tablica[$i]=fgets($fd);
    }
    for($i=0;$i<5;$i++){
        echo $tablica[$i];
    }
    $tablica2 = array_reverse($tablica);

    foreach ($tablica2 as $linia) {
        echo $linia;
    }
    fclose($fd);
    if (!$fd = fopen("C:\Users\andrz\PhpstormProjects\project4\odczyt.txt",'w')) {
        echo "nie udało sie zapisać";
    }
    else{
        for($i=0;$i<5;$i++) {
            echo fputs($fd,$tablica2[$i]);
        }
    }
}
?>