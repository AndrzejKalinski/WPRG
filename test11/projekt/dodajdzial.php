<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
    <form method="post" action="dodajdzial.php">
        <label>Temat:</label>
        <input type="text" name="nazwa" required>
        <br>
        <input type="submit" value="Dodaj dzial">
    </form>

<?php
function checkVar()
{
    return isset($_POST['nazwa']);
}

if (checkVar()) {
    $nazwa = $_POST['nazwa'];
    $db_connection = mysqli_connect("localhost", "root", "", "forum");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {

        $query = "INSERT INTO dzialy (nazwa) VALUES ('$nazwa')";
        $result = mysqli_query($db_connection, $query);

        if (mysqli_affected_rows($db_connection)!=0) {
            echo "Dzial dodany pomyślnie";
            header("Location: hub.php");
            exit();
        } else {
            echo "Nie udało się dodać dzialu";
        }
    }
}
echo '<td> <a href="hub.php">'. 'Powrot' .'</a></td>';
?>