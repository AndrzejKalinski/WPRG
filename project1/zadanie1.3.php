<?php
function cenzura($zdanie){
    $tablica = ["wtorek","slonce","klawiatura"];
    $tablica2 = explode(" ", $zdanie);
    for($i=0;$i<count($tablica2);$i++){
        if(in_array( $tablica2[$i], $tablica)){
            for($y=0;$y<strlen($tablica2[$i]);$y++){
                echo "*";
            }
        }else{
            echo $tablica2[$i];
        }
        echo " ";

    }
}
$zdanie="slonce i klawiatura";
cenzura($zdanie);
?>

