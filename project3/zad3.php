<FORM action="zad3.php" METHOD="get">
    <TABLE>
        <TR>
            <TD>wpisz scieżke</TD>
        </TR>
        <TD><INPUT name="wartosc1"></TD>
        <TD><SELECT name="opcje"><OPTION value="opcja1">odczyt</OPTION><OPTION value="opcja2">dodanie pliku</OPTION><OPTION value="opcja3">usunięcie pliku</OPTION></SELECT></TD>
        </TR>
        <TR>
            <TD>nazwa katalogu do dodania/usunięcia</TD>
        </TR>
        <TD><INPUT name="wartosc2"></TD>
        <TD><INPUT type="submit" value="OK"></TD>
        </TR>
    </TABLE>
</FORM>

<?php


if (isset($_GET['wartosc1'])) {
    $wartosc1 = $_GET['wartosc1'];
    $wartosc2 = $_GET['wartosc2'];
    if ($_GET['opcje'] == 'opcja1') {
        if (!($fd = opendir($wartosc1.$wartosc2)))
            exit("nie można otworzyć katalogu $wartosc1.$wartosc2");
        while (($file = readdir($fd)) !== false)
            echo "$file<br \>\n";
        closedir($fd);
    }
    if ($_GET['opcje'] == 'opcja2') {
        if(file_exists($wartosc2)){
            echo "już jest taki plik";
        }
        else
            mkdir($wartosc1.$wartosc2);
    }
    if ($_GET['opcje'] == 'opcja3') {
        if((file_exists($wartosc1.$wartosc2)) && (0 == filesize( $wartosc1.$wartosc2))){
            rmdir($wartosc1.$wartosc2);
        }

    }
}


?>