<?php
session_start();
// if(!isset($_SESSION['login'])){
//     header("location: dodajprodukt.php");
// }
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

        <title>Hurwownia</title>
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

    <main role="main" class="container col-4">
    <div class="row">
    <div class="col"><h1 class="text-center">Dodwanie nowego produktu</h1></div>
    </div>
    <div class="row">
    <div class="col"><h2 class="text-center">Dane wymagane do utworzenia produktu</h2></div>
    </div>
			<form name = "formularz3"
				action = "dod_produkt.php"
				method = "post">
			
			<table>
				<tr>
					<td> Nazwa </td>	                    <td><input type="text" name="p_nazwa"></td>
				</tr>
				<tr>				
					<td> Rozmiar </td>				    <td><input type="text" name="p_rozmiar"></td>
				</tr>
				<tr>				
					<td> Producent </td>		            <td><input type="text" name="p_producent"></td>
				</tr>
				<tr>
					<td> Dostępność </td>				<td><input type="int" name="p_dostepnosc"></td>
				</tr>
                <tr>
					<td> Cena </td>				<td><input type="int" name="p_cena"></td>
				</tr>
                <tr>
					<td> Typ </td>			<td><input type="text" name="p_typ"></td>
				</tr>
                <tr>
					<td> Opis </td>			<td><input type="text" name="p_opis"></td>
				</tr>

            
				</table>
				
				<input type="submit" type="submit" name="utworz" value="Utwórz">
			
			</forms>

    </main>    
                

        

        
            </body>
        </html>