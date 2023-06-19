<?php
session_save_path("./zapissesji");
session_start();
?>
<form method="post" action="tworzeniekonta.php" enctype="multipart/form-data">
    <label>Pseudonim:</label>
    <input type="text" name="pseudonim" required>
    <br>
    <label>Hasło:</label>
    <input type="password" name="haslo" required>
    <br>
    <label>Zdjęcie:</label>
    <input type="file" name="zdjecie" accept="image/*">
    <br>
    <input type="submit" value="Utwórz konto">
</form>
<?php
function checkVar()
{
    return isset($_POST['pseudonim']) && isset($_POST['haslo']);
}

if (checkVar()) {
    $pseudonim = $_POST['pseudonim'];
    $haslo = $_POST['haslo'];
    $id_Role = 2;
    $zdjecie = $_FILES['zdjecie']['name'];
    $zdjecie_tmp = $_FILES['zdjecie']['tmp_name'];
    $upload_dir = "zapiszdjecia/";

    $db_connection = mysqli_connect("localhost", "root", "", "forum");

    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query = "SELECT * FROM uzytkownicy WHERE pseudonim='$pseudonim'";
        $result = mysqli_query($db_connection, $query);
        if (mysqli_affected_rows($db_connection) > 1) {
            echo "login juz istnieje";
        } else {
            $zdjecie = $upload_dir . $zdjecie;
            $query = "INSERT INTO uzytkownicy (pseudonim, id_Role, zdjecie, haslo) VALUES ('$pseudonim', '$id_Role', '$zdjecie', '$haslo')";
            $result = mysqli_query($db_connection, $query);

            if (mysqli_affected_rows($db_connection) != 0) {
                move_uploaded_file($zdjecie_tmp, $zdjecie);
                echo "Utworzono konto";
                header("Location: logowanie.php");
                exit();
            } else {
                echo "Nie udało się stworzyć konta";
            }
        }
    }
}
echo '<td> <a href="logowanie.php">'. 'Powrot' .'</a></td>';
?>