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

    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <div class="collapse navbar-collapse" id="navbarCollapse"> -->
        <!-- <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="menu.php">Rozgrywki </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
        </li>
        
        </ul> -->
    </div>
    </nav>

    <main role="main" class="container col-2">

    <h2>Kontakt</h2>

			<form name = "formularz4"
				action = "kontaktsc.php"
				method = "post">
			
			<table>
				<tr>
					<td> Temat </td>	<td><input type="subject" name="temat" placeholder="Pełny temat"></td>
				</tr>
                <tr>				
					<td> Nazwa </td>	<td><input type="text" name="name" placeholder="Nazwa"></td>
				</tr>
				<tr>				
					<td> Email </td>	<td><input type="text" name="email" placeholder="Email"></td>
				</tr>
                <tr>				
					<td> Wiadomość </td>	<td><textarea type="massage" placeholder="Wiadomość"></textarea></td>
				</tr>
			</table>
				
            <button class="btn btn-lg btn-primary btn-sm" type="submit">Wyślij Email</button>
			
			</form>

    </main>    
                


</html>