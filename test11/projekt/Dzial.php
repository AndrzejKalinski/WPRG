<?php
session_save_path("./zapissesji");
session_start();
include 'panel.php';
$db_connection = mysqli_connect("localhost", "root", "", "forum");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    if(isset($_GET["id"])){
        $_SESSION["id_Dzialu"] = $_GET["id"];}
    $id=$_SESSION["id_Dzialu"];

    $query = "SELECT Tematy.id,tytul,tresc,data_publikacji,pseudonim,Tematy.id_Uzytkownicy FROM Tematy JOIN Dzialy ON id_Dzialy=Dzialy.id JOIN Uzytkownicy ON id_Uzytkownicy=Uzytkownicy.id WHERE id_Dzialy='$id' ORDER BY data_publikacji DESC";
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
        echo "<td>Autor: </td>";
        echo "<td>Tytul: </td>";
        echo "<td>Tresc: </td>";
        echo "<td>Data publikacji: </td>";
        echo "<td></td>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo '<td> <a href="profiluzytkonika.php?id='. $row["id_Uzytkownicy"] .'">'. $row['pseudonim'] .'</a></td>';
            echo "<td>".$row['tytul']."</td>";
            echo "<td>".$row['tresc']."</td>";
            echo "<td>".$row['data_publikacji']."</td>";
            if($_COOKIE['rola']=='Administrator'||$_COOKIE['rola']=='Moderator'){
                echo '<td> <a href="edytujtemat.php?id='. $row["id"] .'">'. 'Edytuj temat' .'</a></td>';
            }
            if($_COOKIE['rola']=='Administrator'){
                echo '<td> <a href="usuntemat.php?id='. $row["id"] .'">'. 'Usun temat' .'</a></td>';
            }
            echo '<td> <a href="komentarze.php?id='. $row["id"] .'">'. 'Komentarze' .'</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<h2>Brak wyników!</h2>";
    }
    if($_COOKIE['rola']=='Administrator'||$_COOKIE['rola']=='Moderator'||$_COOKIE['rola']=='U?ytkownik'){
        echo '<td> <a href="dodajtemat.php">'. 'Dodaj temat' .'</a></td>';}
}
echo '<td> <a href="hub.php">'. 'Powrot' .'</a></td>';
?>