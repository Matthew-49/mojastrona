<?php
define('OK',0);
define('ERROR',1);
define('BLAD_LOGIN',2);
define('BLAD_HASLO',3);
define('LOGIN_ISTNIEJE',4);
define('PUSTE_POLE',5);
define('BLAD_EMAIL',6);
define('EMAIL_ISTNIEJE',6);



function zarejestruj ($login, $haslo, $email){
    
    global $host, $username, $password, $dbName, $conn;
    
     //Nazwiązanie połączenia z baza
    
    
    //Sprawdzenie poprawności danych dla kodowania UTF-8

    $DlugHasla=strlen(utf8_decode($haslo));
    if($DlugHasla <6 || $DlugHasla >20){
        return BLAD_HASLO;
    }

    if($login=="" || $haslo=="" || $email==""){
        return PUSTE_POLE;
    }

    if(!preg_match("/^[a-zA-Z0-9_.]{4,15}$/", $login)){
        return BLAD_LOGIN;}
    

    if(!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/", $email)){
        return BLAD_EMAIL;}
        
    include_once "polacz.php";

     //Zabezpieczenie znaków specjalnych w parametrach
    $login= $conn->real_escape_string($login);
    $haslo= $conn->real_escape_string($haslo);
    $email= $conn->real_escape_string($email);
    
    //Sprawdzenie czy podany login juz istnieje
    $query = "SELECT nazwa FROM user where nazwa='$login'";
    $result = mysqli_query($conn,$query);


    if(mysqli_num_rows($result)==0){
   }
   else{
       echo'Podany login jest już zajęty. ';
       return LOGIN_ISTNIEJE;
   }


   //Sprawdzenie czy podany email jest juz zajety
   $query = "SELECT email FROM user where email='$email'";
   $result = mysqli_query($conn,$query);


   if(mysqli_num_rows($result)==0){
  }
  else{
      echo'Podany email jest już zajęty. ';
      return EMAIL_ISTNIEJE;
  }



       

    //Dodawanie nowego użytkownika
    $haslo=md5($haslo);

    $query= "INSERT INTO user (userID, nazwa, haslo, email) VALUES (NULL, '$login', '$haslo', '$email')";
    if(!$result = mysqli_query($conn,$query)){
        echo 'Wystąpił błąd: instrukcja INSERT';
            $conn->close();
            return ERROR;
    }
    else {
        echo 'Prawidłowe dodanie rekordu';
        $conn->close();
        return OK;
    }
}

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

    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="menu.php">Rozgrywki </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
        </li>
        
        </ul>
    </div> -->
    </nav>

    <main role="main" class="container">
    

            <?php
            //Odczyt danych z formularza
            $login = $_POST["login"];
            $haslo = $_POST["haslo"];
            $email = $_POST["email"];
            //Wywołanie funkcji rejestrującej nowego użytkownika
            $val = zarejestruj($login, $haslo, $email);

            //Reakcja na wartość zwróconą przez funkcję
            if($val == OK){
                echo "Rejestracja poprawna. Możesz się <a href='../index.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>zalogować</a>";
            }
            else if($val == BLAD_LOGIN){
                echo "Login użytkownika musi mieć od 4 do 15 znaków i może zawierać ";
                echo "jedynie znaki alfabetu łacińskiego oraz cyfry i znaki podkreślenia.";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";
            }
            else if($val == BLAD_HASLO){
                echo "Hasło musi mieć od 6 do 20 znaków. ";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";
            }
            else if($val == LOGIN_ISTNIEJE){
                echo "Użytkownik $login jest już zarejestrowany. ";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";
            }
            else if($val == PUSTE_POLE){
                echo "Proszę wypełnić wszystkie wymagane pola formularza. ";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";;
            }
            else if($val == BLAD_EMAIL){
                echo "Proszę poprawnie wpisać email. ";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";
            }
            else if($val == EMAIL_ISTNIEJE){
                echo "Podany email jest juz zajęty. ";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";
            }
            else {
                echo "Błąd serwera. Rejestracja nie powiodła się. ";
                echo "Wróć do <a href='rejestracja.php' class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>rejestracji</a>";
            }
            
            ?>

    </main>    
                

        

        
    </body>

</html>