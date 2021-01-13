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

    <main role="main" class="container" >
    



        <?php
    global $host, $username, $password, $dbName, $conn;
    include_once "polacz.php";

    $query="SELECT p_ID, p_nazwa, p_rozmiar, p_producent, p_dostepnosc, p_cena, 
    p_typ, p_opis FROM produkt";

    

    $result = mysqli_query($conn,$query);

    ?>


    <?php
    
    if (mysqli_num_rows($result)>0){
        

        echo'<div class="table-responsive-sm ">';
        
        echo'<table class=" table table-striped table-bordered  table-sm" id="table" >';


        echo '<thead>';
        echo '<tr >';
        echo '<th>Nazwa</th>';
        echo '<th>Rozmiar</th>';
        echo '<th>Producent</th>';
        echo '<th>Dostępność</th>';
        echo '<th>Cena</th>';
        echo '<th>Typ</th>';
        echo '<th>Opis</th>';
        echo '<th>Edytuj</th>';
        echo '</tr>';

            echo'<tbody >';
            while ($r=mysqli_fetch_assoc($result)){

                

                echo "<tr>";
           



                        echo "<td>".$r['p_nazwa']."</td>";

                        echo "<td>".$r['p_rozmiar']."</td>";

                        echo "<td>".$r['p_producent']."</td>";

                        echo "<td>".$r['p_dostepnosc']."</td>";

                        echo "<td>".$r['p_cena']."</td>";
                        
                        echo "<td>".$r['p_typ']."</td>";

                        echo "<td>".$r['p_opis']."</td>";

                        echo "<td><a href=\"edytujprodukt.php?&amp;p_ID={$r['p_ID']}\" class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>Edytuj</a> </td>";
      

                /* */
                

                echo "</tr>";

            }
            echo'</tbody>';
        echo'</table>';
      echo'</div>';
    }
    
    else{
        echo "Brak produktów.";
    };


    ?>
    
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