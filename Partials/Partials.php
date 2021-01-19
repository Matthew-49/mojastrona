<?php

class Webpage
{
    public function ShowHeader()
    {
        echo '
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8" />
            <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta name="description" content="Web site created using create-react-app"/>
        
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="style/style.css">
        
             <title>Hurtownia</title>
          </head>
          <body>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="col text-white center mb-4 pt-3">
            <a class="navbar-brand" href="index.php"><h3>Hurtownia</h3></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">';

                   if($_SESSION['username']){
                       echo '<li class="nav-item ">
                        <a class="nav-link" href="menu.php"> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php"><h4>Profil</h4></a>
                    </li>
                    <li class="nav-item" style="float: right">
                        <a href="logout.php" class="nav-link"><h4>Wyloguj</h4></a>
                    </li>
                    <li class="nav-item" style="float: right">
                        <a href="koszyk.php" class="nav-link"><h4>Koszyk</h4></a>
                    </li>';
                   } else {
                       echo '
                           <li class="nav-item ">
                                <a class="nav-link" href="rejestracja.php">Rejestracja</a>
                            </li>                           
                            <li class="nav-item ">
                                <a class="nav-link" href="logowanie.php">Logowanie</a>
                            </li>
                            ';
                   }
                    echo '</ul>
                </div>
            </nav>
        ';
    }
    public function ShowMenu(){
        echo '
        <div class="menu">';
        if(isset($_SESSION['ContactSuccess'])){
            echo "<h2>Twoje zapytanie zostało wysłane, postaramy się odpowiedzieć tak szyko jak to możliwe</h2>";
            unset($_SESSION['ContactSuccess']);
        }
        if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
            echo '<a href="dodajprodukt.php" class="batton"><h3>Dodaj produkt</h3></a>';
        }
            echo '<a href="zamowienia.php" class="batton"><h3>Zamówienia</h3></a>
            <a href="listaproduktow.php" class="batton"><h3>Lista produktów</h3></a>
        </div>
             ';
    }
    public function ShowStopka()
    {
        echo '
        <footer>
            <a href="kontakt.php"><h2>Kontakt</h2></a>
        </footer>
        </body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        </html>
        ';
    }
}
?>