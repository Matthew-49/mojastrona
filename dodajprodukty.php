<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location: index.php");
}

include 'Partials/Partials.php';
$web = new Webpage;
$web->ShowHeader();
?>

<form action="DatabaseEdits/ManageProduct.php" method="POST" class="FormData">

    <input type="text" name="edit" value="addData" style="display: none">

    <label for="nazwa">Nazwa</label>
    <input type="text" name="nazwa">

    <label for="rozmiar">Rozmiar</label>
    <input type="text" name="rozmiar">

    <label for="producent">Producent</label>
    <input type="text" name="producent">

    <label for="dostepnosc">Dostępność</label>
    <input type="number" name="dostepnosc">

    <label for="cena">Cena</label>
    <input type="number" name="cena">

    <label for="typ">Typ</label>
    <input type="text" name="typ">

    <label for="opis">Opis</label>
    <input type="text" name="opis">

    <input type="submit" value="Edytuj">
</form>

<?php

$web->ShowStopka();

?>