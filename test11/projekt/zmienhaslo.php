<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
?>
<form method="post" action="zmienhaslo.php">
    <label>Obecne hasło:</label>
    <input type="password" name="obecne_haslo" required>
    <br>
    <label>Nowe hasło:</label>
    <input type="password" name="nowe_haslo" required>
    <br>
    <input type="submit" value="Zmień hasło">
</form>

<?php
function checkVar()
{
    return isset($_POST['obecne_haslo']) && isset($_POST['nowe_haslo']);
}

if (checkVar()) {
    $obecne_haslo = $_POST['obecne_haslo'];
    $nowe_haslo = $_POST['nowe_haslo'];

    $db_connection = mysqli_connect("localhost", "root", "", "forum");
    $id=$_COOKIE['id'];
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query = "SELECT haslo FROM Uzytkownicy WHERE id='$id'";
        $result = mysqli_query($db_connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['haslo'];

        }
    }
    header('Location: logowanie.php');
}
echo '<td> <a href="hub.php">'. 'Powrot' .'</a></td>';
?>