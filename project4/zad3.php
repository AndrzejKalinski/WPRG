<FORM action="zad3.php" METHOD="post">
    <TABLE>
        <TR>
            <TD>podaj adres</TD>
        </TR>
        <TD><INPUT name="wartosc1"></TD>
        <TD></TD>
        </TR>
        <TR>
            <TD>podaj opis</TD>
        </TR>
        <TD><INPUT name="wartosc2"></TD>
        </TR>
        <TD><INPUT type="submit" value="OK"></TD>
    </TABLE>
</FORM>


<?php

if (!$fd = fopen("C:\Users\andrz\PhpstormProjects\project4\adres.txt",'r')) {
    echo "nie ma pliku";
}
else {

    fclose($fd);
    if (!$fd = fopen("C:\Users\andrz\PhpstormProjects\project4\adres.txt",'a')) {
        echo "nie udało sie zapisać";
    }
        $wartosc1 = $_POST['wartosc1'];
        $wartosc2 = $_POST['wartosc2'];
        fputs($fd,"http://".$wartosc1."/;".$wartosc2."\n");
}

?>