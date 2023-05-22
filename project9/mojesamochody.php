<?php
include 'Samochod.php';
session_save_path("./zapissesji");
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
$id=$_SESSION['id'];

if($_SESSION['rola']=="admin"){
    $query = "SELECT * FROM samochody";
}
else{
    $query = "SELECT * FROM samochody WHERE id_uzytkownik = '$id'";
}
$result = mysqli_query($db_connection, $query);
if (!$result) {
    echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
    exit();
}
if (!mysqli_close($db_connection)) {
    echo "<h2>Błąd przy podczas zamykania połączenia z bazą!</h2>";
    exit();
}
if(!mysqli_num_rows($result)==0)
{
    echo "<table>";
    echo "<tr>";
    echo "<td>id: </td>";
    echo "<td>marka: </td>";
    echo "<td>model: </td>";
    echo "<td>cena: </td>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result))
    {
        $Samochod = new Samochod($row['id'],$row['marka'],$row['model'],$row['cena'],$row['rok'],$row['opis']);
        echo "<tr>";
        echo "<td>" . $id=$Samochod->id  ."</td>";
        echo "<td>" . $marka=$Samochod->marka . "</td>";
        echo "<td>" . $model=$Samochod->model . "</td>";
        echo "<td>" . $cena=$Samochod->cena . " PLN</td>";
        echo "<td>" . '<label><a href="edycjasamochodu.php?id=".$row["id"]>edycja pojazdu</a></label>'. "<td>" ;
        echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "<h2>Brak wyników!</h2>";
}
?>