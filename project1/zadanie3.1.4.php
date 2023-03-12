<?php
$tablica =[];
for ($i=1; $i<10; $i++) {
    $tablica[$i]=rand(1,9);

}
echo "Drukowanie elementow tablicy","\n";
foreach($tablica as $i){
    echo $tablica[$i],",";
}
$liczbamax=0;
foreach($tablica as $i){
    if($tablica[$i]>$liczbamax){
        $liczbamax=$tablica[$i];
    }
}
echo "\n";
echo "maksymalna liczba w tablicy to ",$liczbamax;
?>