<?php

    session_start();

    include 'Partials/Partials.php';
    $web = new Webpage;
    $web->ShowHeader();

    if(isset($_SESSION['username'])){
        $web->ShowNavLogged();
    } else {
        $web->ShowNavNotLogged();
    }

?>

    <main role="main" class="container col-4 pt-5">
        <a href="logowanie.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Logowanie</a>
        <a href="rejestracja.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Rejestracja</a>
    </main>    

<?php
    $web->ShowStopka()
?>