<?php

    session_start();

    include 'Partials/Partials.php';
    $web = new Webpage;
    $web->ShowHeader();

if(isset($_SESSION['username'])){
    $web->ShowMenu();
} else {
    echo '
    <div class="container col-4 pt-5">';
        if($_SESSION['LoggedIn'] == true){
            echo "Successfully logged in";
            unset($_SESSION['LoggedIn']);
        }
        echo '<a href="logowanie.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Logowanie</a>
        <a href="rejestracja.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Rejestracja</a>
    </div>
        ';
}

    $web->ShowStopka()
?>