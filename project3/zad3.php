<FORM action="zad3.php" METHOD="post">
    <TABLE>
        <TR>
            <TD>PODAJ ROK:</TD>
            <TD><INPUT name="rok"></TD>
        <TD><INPUT TYPE="submit" value="OBLICZ"></TD>
        </TR>
    </TABLE>
</FORM>

<?php
if(isset($_POST['rok'])) {
    $rok = $_POST['rok'];
echo $rok;
    if ($rok > 1 && $rok < 1582) {
        $x = 15;
        $y = 6;
    } elseif ($rok > 1583 && $rok < 1699) {
        $x = 22;
        $y = 2;
    } elseif ($rok > 1700 && $rok < 1799) {
        $x = 23;
        $y = 3;
    } elseif ($rok > 1800 && $rok < 1899) {
        $x = 23;
        $y = 4;
    } elseif ($rok > 1900 && $rok < 2099) {
        $x = 24;
        $y = 5;
    } elseif ($rok > 2100 && $rok < 2199) {
        $x = 24;
        $y = 6;
    } else {
        echo "nieprawidlowy rok";
        return 0;
    }

    $a = $rok % 19;
    $b = $rok % 4;
    $c = $rok % 7;
    $d = (19 * $a + $x) % 30;
    $f = (2 * $b + 4 * $c + 6 * $d + $y) % 7;
    if ($f == 6 && $d == 29) {
        echo "Wielkanoc jest 26 kwietnia";
    }
    if ($f == 6 && $d == 28 && (11 * $x + 11) % 30 < 19) {
        echo "Wielkanoc jest 18 kwietnia";
    }
    if ($d + $f < 10) {
        echo "Wielkanoc jest ", (22 + $d + $f), " kwietnia";
    }
    if ($d + $f > 9) {
        echo "Wielkanoc jest ", ($d + $f - 9), " kwietnia";
    }
}
else
    echo "nie podano liczby";
?>
