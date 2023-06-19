<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
<form method="post" action="edytujtemat.php">
    <label>Tytuł:</label>
    <input type="text" name="tytul" required>
    <br>
    <label>Treść:</label>
    <input type="text" name="tresc" required>
    <br>
    <input type="submit" value="Edytuj temat">
</form>

<?php
if(isset($_GET["id"])) $_SESSION["id_tematu"] = $_GET['id'];
$id = $_SESSION["id_tematu"];
function checkVar()
{
    return isset($_POST['tytul']) && isset($_POST['tresc']);
}

if (checkVar()) {
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];

    $db_connection = mysqli_connect("localhost", "root", "", "forum");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query = "UPDATE tematy SET tytul='$tytul', tresc='$tresc' WHERE id='$id'";
        $result = mysqli_query($db_connection, $query);
        if (mysqli_affected_rows($db_connection)!=0) {
            echo "Temat zaktualizowany pomyślnie";
                header('location: Dzial.php');
        } else {
            echo "Nie udało się zaktualizować tematu";
        }
    }
}
?>
