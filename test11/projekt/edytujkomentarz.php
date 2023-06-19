<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
<form method="post" action="edytujkomentarz.php">
    <label>Treść:</label>
    <input type="text" name="tresc" required>
    <br>
    <input type="submit" value="Edytuj komentarz">
</form>

<?php
if(isset($_GET["id"])) $_SESSION["id_komentarza"] = $_GET['id'];
$id = $_SESSION["id_komentarza"];

function checkVar()
{
    return isset($_POST['tresc']);
}

if (checkVar()) {

    $tresc = $_POST['tresc'];

    $db_connection = mysqli_connect("localhost", "root", "", "forum");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {

        $query = "UPDATE komentarze SET tresc='$tresc' WHERE id='$id'";
        $result = mysqli_query($db_connection, $query);

        if (mysqli_affected_rows($db_connection) != 0) {
            echo "Komentarz zaktualizowany pomyślnie";
            header("Location: komentarze.php");
            exit();
        } else {
            echo "Nie udało się zaktualizować komentarza";
        }
    }
}
echo '<td> <a href="komentarze.php">'. 'Powrot' .'</a></td>';
?>