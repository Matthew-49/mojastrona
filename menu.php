<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location: logowanie.php");
}

include 'Partials/Partials.php';
$web = new Webpage;
$web->ShowHeader();
$web->ShowNavLogged();

?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="menu.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="zamowienia.php">Zamówienia </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profil.php">Sprawdź kompletność</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listaproduktow.php">Lista Produktów</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dodajprodukt.php">Dodaj Produkt</a>
        </li>
        
        </ul>
    </div>
    <div class="ml-auto p-2">
    <li class="nav-link text-white text-right ">
        <?php
            echo $_SESSION["login"];    
        ?>
        <a href="logout.php" class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>Wyloguj</a>
        </li>
    </div>
    </nav>

    <main role="main" class="container col-4 pt-5">
        <a href="zamowienia.php" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Zamówienia</a>
        <a href=".php" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Sprawdź kompletność</a>
        <a href="Products/listaproduktow.php" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Lista produktów</a>
        <a href="Products/dodajprodukt.php" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Dodaj produkt</a>
    </main>

<?php
$web->ShowStopka()
?>