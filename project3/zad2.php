<?php
    function rekurencjaFibonacci ($a){
        if ($a==0){
            return 0;
        }
        if ($a==1){
            return 1;
        }
        return rekurencjaFibonacci($a-1)+rekurencjaFibonacci($a-2);
    }
    function Fibonacci($a){
        if ($a==0){
            return 0;
        }
        if ($a==1){
            return 1;
        }
        $x=1;
        $y=0;
        for ($i=1;$i<$a;$i++){
            $z=$y;
            $y=$x;
            $x+=$z;
        }
        return $x;
    }
    $a=7;
    echo "Funkcja rekurencyjna";
    echo "\n";
    $czas1=microtime(true);
    echo "Wartość elementu ",$a," ciągu Fibonacciego: ";
    echo rekurencjaFibonacci($a);
    echo "\n";
    $czas2=microtime(true);
    echo "Czas wykonania funkcji rekurencyjnej :";
    echo $czas2-$czas1;
    echo "\n";
    echo "Funkcja nie rekurencyjna";
    echo "\n";
    $czas1=microtime(true);
    echo "Wartość elementu ",$a," ciągu Fibonacciego: ";
    echo Fibonacci($a);
    echo "\n";
    $czas2=microtime(true);
    echo "Czas wykonania funkcji nie rekurencyjnej :";
    echo $czas2-$czas1;
    echo "\n";
?>