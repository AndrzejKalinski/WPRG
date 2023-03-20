<FORM action="zad2.php" METHOD="post">
    <TABLE>
        <TR>
            <TD>Kalkulator prosty</TD>
        </TR>
            <TD><INPUT name="wartosc1" placeholder="wartość 1"></TD>
            <TD><SELECT name="opcje"><OPTION value="opcja1">dodawanie</OPTION><OPTION value="opcja2">odejmowanie</OPTION><OPTION value="opcja3">mnozenie</OPTION><OPTION value="opcja4">dzielenie</OPTION></SELECT></TD>
            <TD><INPUT name="wartosc2" placeholder="wartość 2 "></TD>
        </TR>
            <TD><INPUT type="submit" value="Oblicz"></TD>
        </TR>
    </TABLE>
</FORM>
<FORM action="zad2.php" METHOD="post">
    <TABLE>
        <TR>
            <TD>Kalkulator zaawansowany</TD>
        </TR>
            <TD><INPUT name="wartosc3" placeholder="wartość 1"></TD>
            <TD><SELECT name="opcjee"><OPTION value="opcja11">cosinus</OPTION><OPTION value="opcja22">sinus</OPTION><OPTION value="opcja33">tangens</OPTION><OPTION value="opcja44">binarne na dziesietne</OPTION><OPTION value="opcja55">dziesietne na binarne</OPTION><OPTION value="opcja66">dziesietne na szesnastkowe</OPTION><OPTION value="opcja77">szesnastkowe na dziesietne</OPTION><OPTION value="opcja88">stopnie na radiany</OPTION><OPTION value="opcja99">radiany na stopnie</OPTION></SELECT></TD>
        </TR>
        <TD><INPUT type="submit" value="Oblicz"></TD>
        </TR>
    </TABLE>
</FORM>


<?php
if (isset($_POST['wartosc1'],$_POST['wartosc2'])) {
    $wartosc1 = $_POST['wartosc1'];
    $wartosc2 = $_POST['wartosc2'];
    if($_POST['opcje']=='opcja1'){
        echo $wartosc1+$wartosc2;
    }
    elseif($_POST['opcje']=='opcja2'){
        echo $wartosc1-$wartosc2;
    }
    elseif($_POST['opcje']=='opcja3'){
        echo $wartosc1*$wartosc2;
    }
    elseif($_POST['opcje']=='opcja4'){
        echo $wartosc1/$wartosc2;
    }

}
if (isset($_POST['wartosc3'])) {
    $wartosc3 = $_POST['wartosc3'];
    if($_POST['opcjee']=='opcja11'){
        echo cos($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja22'){
        echo sin($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja33'){
        echo tan($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja44'){
        echo bindec($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja55'){
        echo decbin($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja66'){
        echo dechex($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja77'){
        echo hexdec($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja88'){
        echo deg2rad($wartosc3);
    }
    elseif($_POST['opcjee']=='opcja99'){
        echo rad2deg($wartosc3);
    }
}
?>
