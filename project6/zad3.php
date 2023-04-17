<?php


if (!$fd = fopen("./counter3.txt",'r'))
    echo "nie ma pliku";
else{
    $counter=fgets($fd);
    fclose($fd);
}
if (!$fd = fopen("./counter3.txt",'w'))
    echo "nie ma pliku";
else {
    if (!isset($_COOKIE['counter'])){
        $counter += 1;
        setcookie('counter', $counter);
    }
}
fputs($fd, $counter);
echo $counter;
fclose($fd);

?>



