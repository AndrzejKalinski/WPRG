<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
    <form method="post" action="edycjadzial.php">
        <label>Temat:</label>
        <input type="text" name="nazwa" required>
        <br>
        <input type="submit" value="Edytuj dzial">
    </form>

<?php
if(isset($_GET["id"])) $_SESSION["id_dzialu"] = $_GET['id'];
$id = $_SESSION["id_dzialu"];

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

        $query = "UPDATE dzialy SET nazwa='$nazwa' WHERE id='$id'";
        $result = mysqli_query($db_connection, $query);

        if (mysqli_affected_rows($db_connection) != 0) {
            echo "Dzial zaktualizowany pomyślnie";
            header("Location: hub.php");
            exit();
        } else {
            echo "Nie udało się zaktualizować dzialu";
        }
    }
}
echo '<td> <a href="hub.php">'. 'Powrot' .'</a></td>';
?>