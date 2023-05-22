<?php
include 'Samochod.php';
session_save_path("./zapissesji");
session_start();
function checkVar(){
    RETURN isset($_POST['login']) && isset($_POST['haslo']);
}
if (checkVar()){
    $login=$_POST['login'];
    $haslo=$_POST['haslo'];
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Logowanie</title>
    </head>
    <body>
    <h1>Logowanie</h1>
    <form method="POST" action="logowanie.php">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login"><br>
        <label for="haslo">Hasło:</label>
        <input type="password" name="haslo" id="haslo"><br>
        <input type="submit" value="Zaloguj">
    </form>
    </body>
    </html>
<?php
if(checkVar()) {
    $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query = "SELECT * FROM uzytkownik JOIN role ON id_rola = role.id WHERE login = '$login' AND haslo = '$haslo'";
        $result = mysqli_query($db_connection, $query);
        $row = mysqli_fetch_array($result);
        $_SESSION["id"]=$row["id"];
        $_SESSION["rola"]=$row["rola"];
        header("Location: zad2.php");
    }
}
?>