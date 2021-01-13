<?php
session_start();
// if(!isset($_SESSION['login'])){
//     header("location: log_form.php");
// }
define('OK',0);
define('ERROR',1);





function edytuj($p_nazwa, $p_rozmiar, $p_producent, $p_dostepnosc, $p_cena, 
$p_typ, $p_opis){

global $host, $username, $password, $dbName, $conn;

$login=$_SESSION['login'];
include_once "polacz.php";

$query="SELECT userID FROM user WHERE nazwa='$login'";
    
    $result = mysqli_query($conn,$query) or die('Błąd zapytania');
    
    if (mysqli_num_rows($result)>0){
        while ($r=mysqli_fetch_assoc($result)){
        $w_org_id=$r['userID'];
        }

    }


    $p_ID = $_POST["p_ID"];

    $query= "UPDATE wydarzenie SET p_nazwa='$p_nazwa',p_rozmiar='$p_rozmiar',p_producent='$p_producent',
    p_dostepnosc='$p_dostepnosc',p_cena='$p_cena',p_typ='$p_typ',p_opis='$p_opis' 
    WHERE p_ID='$p_ID'";


    if(!$result = mysqli_query($conn,$query)){
        echo 'Wystąpił błąd, przepraszamy';
            $conn->close();
            return ERROR;
    }
    else {
        echo 'Prawidłowa aktualizacja danych.';
        $conn->close();
        return OK;
    }
}
?>
?>
    <!doctype html>
    <html lang="pl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <title>Hurtownia</title>
    </head>
        
        <body>

    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">

    <a class="navbar-brand" href="../menu.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="../zamowienia.php">Zamówienia </a>
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
        <a href="../Auth/logout.php" class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>Wyloguj</a>
        </li>
    </div>
    </nav>

    <main role="main" class="container">
    
    <?php
                //Odczyt danych z formularza
                $p_nazwa        = $_POST["p_nazwa"];
                $p_rozmiar          = $_POST["p_rozmiar"];
                $p_producent          = $_POST["p_producent"];
                $p_dostepnosc     = $_POST["p_dostepnosc"];
                $p_cena     = $_POST["p_cena"];
                $p_typ      = $_POST["p_typ"];
                $p_opis      = $_POST["p_opis"];
                
                $val = edytuj($p_nazwa, $p_rozmiar, $p_producent, $p_dostepnosc, $p_cena, 
                $p_typ, $p_opis);

                if($val == OK){
                    echo " Informacje zostały poprawnie zmienione.";
                }
                else {
                    echo " Błąd serwera. Zmiana informaci nie powiodła się.";
                    
                }
                ?>
                <a href="javascript: window.location.href='<?php echo $_SERVER['HTTP_REFERER'] ?>'" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Wróć do listy produktów</a>

    </main>    
                

        

        
            </body>
        </html>