<?php
echo '<fieldset>';
$id=$_COOKIE['id'];
if($_COOKIE['rola']!='gosc'){
echo ' <a href="profiluzytkonika.php?id='.$id.'">Moje konto</a>';
echo ' <a href="wyloguj.php">Wyloguj</a>';
echo '<td> <a href="zmienhaslo.php">Zmien haslo</a></td>';}
if($_COOKIE['rola']=='gosc'){
    echo ' <a href="wyloguj.php">Zaloguj sie</a>';}
echo '</fieldset>';
?>