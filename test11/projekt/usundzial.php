<?php
session_save_path("./zapissesji");
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "forum");

if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}

if (isset($_GET['id'])) {
    $id_dzialu = $_GET['id'];}

    $query = "DELETE FROM dzialy WHERE id = '$id_dzialu'";
    $result = mysqli_query($db_connection, $query);

    if (mysqli_affected_rows($db_connection)!=0){
        echo "Dzial usunięty pomyślnie";
        header("Location: hub.php");
        exit();
    } else {
        echo "Nie udało się usunąć dzialu";
    }

?>