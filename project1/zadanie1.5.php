<?php
echo "aby obliczyc natepujace figury wpisz: a(trojkat),b(trapez),c(prostokat): ";
$e=readline();
switch($e){
    case 'a':
        echo trojkat();
        break;
    case 'b':
        echo trapez();
        break;
    case 'c':
        echo prostokat();
        break;


}
function trojkat(){
    echo"podaj podstawe: ";
    $a=readline();
    echo"podaj wysokosc: ";
    $h=readline();
    echo "pole trokata: ";
    return ($a*$h)/2;
}
function trapez(){
    echo"podaj dluzsza podstawe: ";
    $a=readline();
    echo"podaj krotsza podstawe: ";
    $b=readline();
    echo"podaj wysokosc: ";
    $h=readline();
    echo "pole trapezu: ";
    return (($a+$b)*$h)/2;
}
function prostokat(){
    echo"podaj bok a: ";
    $a=readline();
    echo"podaj bok b: ";
    $b=readline();
    echo "pole prostokata: ";
    return ($a*$b);
}
?>
