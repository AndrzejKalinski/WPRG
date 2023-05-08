
<?php
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
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["marka"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>" . $row["cena"] . "</td>";
        echo "<td>" . $row["rok"] . "</td>";
        echo "<td>" . $row["opis"] . "</td>";
        echo "</tr>";
    }
}
?>
