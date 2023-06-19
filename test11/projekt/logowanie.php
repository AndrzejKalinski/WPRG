<?php
session_save_path("./zapissesji");
session_start();
if(isset($_COOKIE['zalogowany'])){
    header("Location: hub.php");
}
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
    $db_connection = mysqli_connect("localhost", "root", "", "forum");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query = "SELECT uzytkownicy.id,role.nazwa,pseudonim FROM Uzytkownicy JOIN Role ON id_Role = Role.id WHERE pseudonim = '$login' AND haslo = '$haslo'";
        $result = mysqli_query($db_connection, $query);
        $row = mysqli_fetch_array($result);
        if(mysqli_affected_rows($db_connection)==1){
            setcookie("pesudonim",$row["pseudonim"],time()+14*24*60*60);
            setcookie("id", $row["id"],time()+14*24*60*60);
            setcookie("rola", $row["nazwa"],time()+14*24*60*60);
            setcookie("zalogowany","zalogowany",time()+14*24*60*60);

            header("Location: hub.php");
        }else{
            echo "niepoprawny login lub haslo";
        }

    }
}
echo '<td> <a href="tworzeniekonta.php">Stworz konto</a></td>';
echo '<td> <a href="logowaniegosc.php">Kontunuuj jako gosc</a></td>';
?>


