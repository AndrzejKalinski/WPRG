<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
<form method="post" action="dodajkomentarz.php">
    <label>Treść:</label>
    <input type="text" name="tresc" required>
    <br>
    <input type="submit" value="Dodaj komentarz">
</form>

<?php
function checkVar()
{
    return isset($_POST['tresc']);
}

if (checkVar()) {
    $tresc = $_POST['tresc'];

    $db_connection = mysqli_connect("localhost", "root", "", "forum");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        if (isset($_SESSION["id_Tematy"])) {
            $id = $_SESSION["id_Tematy"];
        } else {
            echo "<h2>Błąd: Brak identyfikatora tematu!</h2>";
            exit();
        }
        $data_publikacji = date("Y-m-d");
        $id_Uzytkownicy = $_COOKIE['id'];
        if(isset($COOKIE["zalogowany"])){
        $query = "INSERT INTO komentarze (id_Tematy, tresc, data_publikacji, id_Uzytkownicy,gosc) VALUES ('$id', '$tresc', '$data_publikacji', '$id_Uzytkownicy',null)";}
        else{
            $pesudonim=$_COOKIE['pseudonim'];
            $query = "INSERT INTO komentarze (id_Tematy, tresc, data_publikacji, id_Uzytkownicy,gosc) VALUES ('$id', '$tresc', '$data_publikacji', '$id_Uzytkownicy','$pesudonim')";
        }
        $result = mysqli_query($db_connection, $query);

        if (mysqli_affected_rows($db_connection)!=0) {
            echo "Komentarz dodany pomyślnie";
            header("Location: komentarze.php");
            exit();
        } else {
            echo "Nie udało się dodać komentarza";
        }
    }
}

$id = $_SESSION['id_Tematy'];
echo '<td> <a href="komentarze.php?id='.$id.'">Powrót do komentarzy</a></td>';
?>