<?php
$tablica=[];
echo $_SERVER['REMOTE_ADDR'];
if (!$fd = fopen("C:\Users\andrz\PhpstormProjects\project4\adresyip.txt",'r')) {
    echo "nie ma pliku";
    while (!feof($fd)) {
            $tablica[] = fgets($fd);
        }
    }
$szukanie = array_search($_SERVER['REMOTE_ADDR'], $tablica);
    if ($szukanie="127.0.0.1")
        echo header("Location: http://localhost:63342/project4/strona4.php?_ijt=28s6pfp87cdetac2h4lto28c8e&_ij_reload=RELOAD_ON_SAVE");
    else {
        echo header("Location: http://localhost:63342/project4/strona41.php?_ijt=jooujt16l1qhn2630u82eeppa7&_ij_reload=RELOAD_ON_SAVE");
    }
?>
