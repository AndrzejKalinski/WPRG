<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
$db_connection = mysqli_connect("localhost", "root", "", "forum");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    if(isset($_GET["id"])) $id = $_GET["id"];


    $query = "SELECT pseudonim,zdjecie,nazwa FROM uzytkownicy JOIN role ON id_Role=role.id WHERE uzytkownicy.id='$id'";
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
        echo "<td>Pseudonim: </td>";
        echo "<td>Rola: </td>";
        echo "<td>Zdjecie: </td>";
        echo "<td></td>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['pseudonim']."</td>";
            echo "<td>".$row['nazwa']."</td>";
            echo "<td><img src='".$row['zdjecie']."' alt='Zdjęcie'></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<h2>Brak wyników!</h2>";
    }
}
?>