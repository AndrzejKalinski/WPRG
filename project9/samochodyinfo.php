
<?php
include 'Samochod.php';
session_save_path("./zapissesji");
session_start();
$id=$_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT * FROM samochody where id=".$id;
    $result = mysqli_query($db_connection, $query);
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    }
    if (!mysqli_close($db_connection)) {
        echo "<h2>Błąd przy podczas zamykania połączenia z bazą!</h2>";
        exit();
    }
    if (!mysqli_num_rows($result) == 0) {
        $row = mysqli_fetch_array($result);
        $Samochod = new Samochod($row['id'],$row['marka'],$row['model'],$row['cena'],$row['rok'],$row['opis']);
        echo "<tr>";
        echo "<td>" . $id=$Samochod->id . "</td>";
        echo "<td>" . $marka=$Samochod->marka  . "</td>";
        echo "<td>" . $model=$Samochod->model . "</td>";
        echo "<td>" . $cena=$Samochod->cena . "</td>";
        echo "<td>" . $rok=$Samochod->rok  . "</td>";
        echo "<td>" . $opis=$Samochod->opis  . "</td>";
        echo "</tr>";
    }
}
?>