<?php
session_start();
// if(!isset($_SESSION['login'])){
//     header("location: logowanie.php");
// }
?>
    <!doctype html>
    <html lang="pl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">            
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <script src="excel-bootstrap-table-filter-bundle.js"></script>
        <link rel="stylesheet" href="excel-bootstrap-table-filter-style.css">

        

        <title>Hurtownia</title>
    </head>
        
        <body>

    
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


        <a href="listaproduktow.php" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Lista produktów</a>


        <a href="dodajprodukt.php" class="btn btn-dark btn-lg active btn-block" role="button" aria-pressed="true">Dodaj produkt</a>
    
    </main>  







    <script>
    // Use the plugin once the DOM has been loaded.
    $(function () {
      // Apply the plugin 
      $('#table').excelTableFilter();
    });
  </script>



  
        

        
            </body>
        </html>