<?php
session_save_path("./zapissesji");
session_start();
if (!isset($_GET['id'])) {
    echo "<h2>Nie podano identyfikatora samochodu!</h2>";
    exit();
}
$id=$_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT * FROM samochody where id='$id'";
    $result = mysqli_query($db_connection, $query);
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    }
    if (!mysqli_close($db_connection)) {
        echo "<h2>Błąd przy podczas zamykania połączenia z bazą!</h2>";
        exit();
    }
    if (mysqli_num_rows($result) == 0) {
        $row = mysqli_fetch_array($result);
        $marka=$row['marka'];
        $model=$row['model'];
        $cena=$row['cena'];
        $rok=$row['rok'];
        $opis=$row['opis'];
    }
}
?>
<form method="post" action="edycjasamochodu.php">
    <label>Marka:</label>
    <input type="text" name="marka" value="<?php echo ($marka) ?>" required>
    <br>
    <label>Model:</label>
    <input type="text" name="model " value="<?php echo ($model) ?>" required>
    <br>
    <label>Cena:</label>
    <input type="number" name="cena" value="<?php echo ($cena) ?>" required>
    <br>
    <label>Rok produkcji:</label>
    <input type="number" name="rok" value="<?php echo ($rok) ?>" required>
    <br>
    <label>Opis:</label>
    <input type="text" name="opis" value="<?php echo ($opis) ?>" required>
    <br>
    <input type="submit" value="gotowe">
</form>

