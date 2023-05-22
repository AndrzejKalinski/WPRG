<?php
session_save_path("./zapissesji");
session_start();
?>

<head>
    <title>Samochody</title>
</head>
<body>
<fieldset>
    <legend>Samochody:</legend>
    <label><a href="stronaglowna.php">Strona główna</a></label><br><br>
    <label><a href="wszystkiesamochody.php">Wszystkie samochody</a></label><br><br>
    <label><a href="dodajsamochod.php">Dodaj samochód</a></label><br><br>
    <?php
    if($_SESSION['id']!=1) {
        echo '<label ><a href = "mojesamochody.php" > Moj samochod </a ></label ><br ><br >';
    }
    ?>
</fieldset>
</body>