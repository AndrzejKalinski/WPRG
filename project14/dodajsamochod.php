<form method="post" action="dodajsamochod.php">
    <label>Marka:</label>
    <input type="text" name="marka" required>
    <br>
    <label>Model:</label>
    <input type="text" name="model" required>
    <br>
    <label>Cena:</label>
    <input type="number" name="cena" required>
    <br>
    <label>Rok produkcji:</label>
    <input type="number" name="rok" required>
    <br>
    <label>Opis:</label>
    <input type="text" name="opis" required>
    <br>
    <input type="submit" value="Dodaj samochód">
</form>

<?php
function checkVar()
{
    return isset($_POST['model']) && isset($_POST['marka']) && isset($_POST['rok']) && isset($_POST['cena']) && isset($_POST['opis']);
}

if(checkVar()){
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $cena = $_POST['cena'];
    $rok = $_POST['rok'];
    $opis = $_POST['opis'];

    $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query = "INSERT INTO samochody (marka, model, cena, rok, opis) VALUES ('$marka', '$model', '$cena', '$rok', '$opis')";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            echo "Pojazd dodany pomyslnie";
        } else {
            echo "Pojazd nie zostal dodany";
        }
    }
}
?>
<BR><a href="zad2.php">początek

