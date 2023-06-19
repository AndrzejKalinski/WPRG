<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
$db_connection = mysqli_connect("localhost", "root", "", "forum");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $query = "SELECT * FROM Dzialy";
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
        echo "<td>Dzial: </td>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo '<td> <a href="Dzial.php?id='. $row["id"] .'">'. $row["nazwa"] .'</a></td>';
            if($_COOKIE['rola']=='Administrator'){
                echo '<td> <a href="edycjadzial.php?id='.$row["id"].'">'. 'Edytuj dzial' .'</a></td>';}
            if($_COOKIE['rola']=='Administrator'){
                echo '<td> <a href="usundzial.php?id='.$row["id"].'">'. 'Usun dzial' .'</a></td>';}
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<h2>Brak wyników!</h2>";
    }
    if($_COOKIE['rola']=='Administrator'){
        echo '<td> <a href="dodajdzial.php">'. 'Dodaj dzial' .'</a></td>';}
}
?>