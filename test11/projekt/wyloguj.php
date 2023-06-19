<?php
session_save_path("./zapissesji");
session_start();

if (isset($_COOKIE['pseudonim'])) {
    setcookie('pseudonim', '', time() - 3600);
}

if (isset($_COOKIE['id'])) {
    setcookie('id', '', time() - 3600);
}

if (isset($_COOKIE['rola'])) {
    setcookie('rola', '', time() - 3600);
}

if (isset($_COOKIE['zalogowany'])) {
    setcookie('zalogowany', '', time() - 3600);
}

header("Location: logowanie.php");
exit();
?>