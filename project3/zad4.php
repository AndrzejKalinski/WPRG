<FORM action="zad4.php" METHOD="post">
    <TABLE>
        <TR>
            <TD>PESEL:</TD>
            <TD><INPUT name="pesel"></TD>
        </TR>
<?php
$data1 = substr($_POST['pesel'], 0, 2);
$data2 = substr($_POST['pesel'], 2, 2);
$data3 = substr($_POST['pesel'], 4, 2);
echo $data3, "/", $data2, "/", $data1;


if(($_POST['pesel'][9])%2==0){
    echo " kobieta";}
    else{
       echo  " mężczyzna";}


?>