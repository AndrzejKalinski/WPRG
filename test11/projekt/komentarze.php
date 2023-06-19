<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
$db_connection = mysqli_connect("localhost", "root", "", "forum");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    if(isset($_GET["id"])) $_SESSION["id_Tematy"]= $_GET["id"];
    $id = $_SESSION["id_Tematy"];


    $query = "SELECT Komentarze.id,Komentarze.tresc,Komentarze.data_publikacji,pseudonim,gosc,Komentarze.id_Uzytkownicy FROM Komentarze JOIN Tematy ON id_Tematy=Tematy.id JOIN Uzytkownicy ON Komentarze.id_Uzytkownicy=Uzytkownicy.id WHERE id_Tematy='$id 'ORDER BY data_publikacji DESC";
    $result = mysqli_query($db_connection, $query);
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    }
    if (!mysqli_close($db_connection)) {
        echo "<h2>Błąd przy podczas zamykania połączenia z bazą!</h2>";
        exit();
    }
    if(!mysqli_num_rows($result)==0)
    {
        echo "<table>";
        echo "<tr>";
        echo "<td>Komentarze: </td>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            if($row["gosc"]!=null){
                echo "<td>".$row['gosc']."</td>";
            }
            else{
                echo '<td> <a href="profiluzytkonika.php?id='. $row["id_Uzytkownicy"] .'">'. $row['pseudonim'] .'</a></td>';
            }
            echo "<td>".$row['tresc']."</td>";
            echo "<td>".$row['data_publikacji']."</td>";
            if($_COOKIE['rola']=='Administrator'||$_COOKIE['rola']=='Moderator'){
            echo '<td> <a href="edytujkomentarz.php?id='. $row["id"] .'">edycja komentarza</a></td>';}
            if($_COOKIE['rola']=='Administrator'){
            echo '<td> <a href="usunkomentarz.php?id='. $row["id"] .'">usun komentarz</a></td>';}
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<h2>Brak wyników!</h2>";
    }
}
echo '<td> <a href="dodajkomentarz.php">Dodaj komentarz</a></td>';
echo '<td> <a href="Dzial.php">'. 'Powrot' .'</a></td>';
?>