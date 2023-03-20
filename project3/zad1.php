<FORM action="zad1.php" METHOD="post">
<TABLE>
<TR>
    <TD>Imię i nazwisko:</TD>
    <TD><INPUT name="imienazwisko" placeholder="twoje imię i nazwisko"></TD>
</TR>
<TR>
    <TD>Adres e-mail:</TD>
    <TD><INPUT name="e-mail"placeholder="Twój adres e-mail np. j.kowalski"></TD>
</TR>
<TR>
    <TD>Telefon kontaktowy:</TD>
    <TD><INPUT name="telefonkontaktowy"placeholder="Dozwolone znaki: cyfry, spacje"></TD>
</TR>
<TR>
    <TD>Wybierz temat:</TD>
    <TD><SELECT name="wybierztemat"><OPTION value="opcja1">Wykonanie strony internetowej</OPTION><OPTION value="opcja2">inna opcja</OPTION></SELECT></TD>
</TR>

<TR>
    <TD>Treść wiadomości:</TD>
    <TD><TEXTAREA name="treść" cols="20" rows="5" placeholder="Wypisz tutaj treść swojej wiadomości..."></TEXTAREA></TD>
</TR>


<TR>
    <TD>Preferowana forma kontaktu</TD>
</TR>
    <TD><INPUT TYPE=CHECKBOX name="q1">E-mail</TD>
</TR>
    <TD><INPUT TYPE=CHECKBOX name="q2">Telefon</TD>
</TR>

<TR>
    <TD>Posiadasz strone www?</TD>
</TR>
    <TD><INPUT TYPE=RADIO name="w">Tak</TD>
</TR>
    <TD><INPUT TYPE=RADIO name="w">Nie</TD>
</TR>

<TR>
    <TD>Załączniki:</TD>
</TR>
    <TD><INPUT TYPE=BUTTON value="Wybierz plik"> nie wybrano pliku</TD>
</TR>

<TR>
<TD> </TD>
<TD><INPUT type="submit" value="Wyślij formularz"></TD>
</TR>
</TABLE>
</FORM>

<?php
    $tablica=[];

if (isset($_POST['imienazwisko'])){
    $tablica[]=$_POST['imienazwisko'];
};

if (isset($_POST['e-mail'])){
    $tablica[]=$_POST['e-mail'];
};

if (isset($_POST['telefonkontaktowy'])){
    $tablica[]=$_POST['telefonkontaktowy'];
};

if (isset($_POST['wybierztemat'])){
    $tablica[]=$_POST['wybierztemat'];
};

if (isset($_POST['treść'])){
    $tablica[]=$_POST['treść'];
};

if (isset($_POST['q1'])){
    $tablica[]=$_POST['q1'];
};

if (isset($_POST['q2'])){
    $tablica[]=$_POST['q2'];
};

if (isset($_POST['w'])){
    $tablica[]=$_POST['w'];
};

foreach($tablica as $element){
    echo $element;
    echo("<br>");
};
?>
