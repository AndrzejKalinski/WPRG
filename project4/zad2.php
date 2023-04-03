<?php


if (!$fd = fopen("C:\Users\andrz\OneDrive\Pulpit\counter.txt",'r'))
    echo "nie ma pliku";
else{
    $counter=fgets($fd);
    fclose($fd);
}
if (!$fd = fopen("C:\Users\andrz\OneDrive\Pulpit\counter.txt",'w'))
    echo "nie ma pliku";
else {
    $counter+=1;
    echo $counter;
    fputs($fd, $counter);
}
    fclose($fd);

?>