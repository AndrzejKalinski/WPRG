<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logowanie(gosc)</title>
</head>
<body>
<h1>Logowanie(gosc)</h1>
<form method="POST" action="logowaniegosc.php">
    <label for="Pseudonim">Login:</label>
    <input type="text" name="pseudonim" id="login"><br>
    <input type="submit" value="Zaloguj">
</form>
</body>
</html>
<?php
session_save_path("./zapissesji");
session_start();
function checkVar(){
    return isset($_POST['pseudonim']);
}
if (checkVar()){
    $pseudonim=$_POST['pseudonim'];
    $gosc=$pseudonim."(gosc)";
    $gosc_decoded = urldecode($gosc);
    setcookie("pseudonim", $gosc_decoded);
    setcookie("id", 6);
    setcookie("rola", "gosc");
    header('Location: hub.php');
}
echo '<td> <a href="logowanie.php">'. 'Powrot' .'</a></td>';


?>