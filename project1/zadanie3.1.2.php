<?php
$tablica =[];
for ($i=1; $i<10; $i++) {
    $tablica[$i]=rand(1,9);

}
echo "Drukowanie elementow tablicy","\n";
for($i=1; $i<10; $i++){
    echo $tablica[$i],",";
}
$liczbamax=0;
$i=1;
while($i<10){
    if($tablica[$i]>$liczbamax){
        $liczbamax=$tablica[$i];
    }
    $i++;
}

echo "\n";
echo "maksymalna liczba w tablicy to ",$liczbamax;
?>