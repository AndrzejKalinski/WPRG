<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
<form method="post" action="dodajtemat.php">
    <label>Tytul:</label>
    <input type="text" name="tytul" required>
    <br>
    <label>Treść:</label>
    <input type="text" name="tresc" required>
    <br>
    <input type="submit" value="Dodaj temat">
</form>

<?php
function checkVar()
{
    return isset($_POST['tytul']) && isset($_POST['tresc']);
}

if (checkVar()) {
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];

    $db_connection = mysqli_connect("localhost", "root", "", "forum");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        if (isset($_SESSION["id_Dzialu"])) {
            $id = $_SESSION["id_Dzialu"];
        } else {
            echo "<h2>Błąd: Brak identyfikatora tematu!</h2>";
            exit();
        }
        $data_publikacji = date("Y-m-d");
        $id_Uzytkownicy = $_COOKIE['id'];

        $query = "INSERT INTO tematy (id_Dzialy, tytul, tresc, data_publikacji, id_Uzytkownicy) VALUES ('$id', '$tytul', '$tresc', '$data_publikacji', '$id_Uzytkownicy')";
        $result = mysqli_query($db_connection, $query);

        if (mysqli_affected_rows($db_connection)!=0) {
            echo "Temat dodany pomyślnie";
            header("Location: Dzial.php");
            exit();
        } else {
            echo "Nie udało się dodać tematu";
        }
    }
}
echo '<td> <a href="Dzial.php">'. 'Powrot' .'</a></td>';
?>