<?php
function pesel($a){
    $data1 = substr($a, 0, 2);
    $data2 = substr($a, 2, 2);
    $data3 = substr($a, 4, 2);
    echo $data3,"/",$data2,"/",$data1;
}
$a=(int)readline();
echo pesel($a);
?>
