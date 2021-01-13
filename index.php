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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="col text-white center mb-4 pt-3"><h1>Hurtownia<h1></div>
    <!-- <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="menu.php"> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
        </li>
        </ul>
    </div> -->
    </nav>

    <main role="main" class="container col-4 pt-5">

        <a href="Auth/logowanie.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Logowanie</a>

  
        <a href="Auth/rejestracja.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Rejestracja</a>
    
    </main>    
                
    
 </body>

        </html>