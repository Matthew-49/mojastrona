        
        <!doctype html>
        <html lang="pl">
        <head>
            
            <script type="text/javascript">  
            if ("serviceWorker" in navigator) {
              if (navigator.serviceWorker.controller) {
                console.log("[PWA Builder] active service worker found, no need to register");
              } else {
                // Register the service worker
                navigator.serviceWorker
                  .register("pwabuilder-sw.js", {
                    scope: "./"
                  })
                  .then(function (reg) {
                    console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
                  });
              }
            }
        </script>
        
        
            
			<link rel="manifest" href="manifest.json" />
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
            <link rel="stylesheet" href="style/style.css">
            
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
           
            <title>Hurtownia</title>
        </head>
        
        <body>
    
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

        <a href="logowanie.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Logowanie</a>

  
        <a href="rejestracja.php" class=" btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Rejestracja</a>
    
    </main>    
                
    
 </body>

        </html>