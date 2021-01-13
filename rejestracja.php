<?php

session_start();

include 'Partials/Partials.php';
$web = new Webpage;
$web->ShowHeader();

if(isset($_SESSION['username'])){
    $web->ShowNavLogged();
} else {
    $web->ShowNavRegisterLogin();
}

?>
<main role="main" class="container col-4">
    <h2 class="text-center">Formularz rejestracyjny</h2>
    <form name = "formularz1"
          action = "rejestracjasc.php"
          method = "post">

        <div class="form-group">
            <input type="text" name="email" placeholder="   Email">
        </div>
        <div class="form-group">
            <input type="text" name="login" placeholder="   Login">
        </div>
        <div class="form-group">
            <input type="password" name="haslo" placeholder="   Hasło">
        </div>
        <div class="form-group">
            <input type="password" name="haslo2" placeholder="   Powtórz Hasło">
        </div>

        <button class="btn btn-lg btn-primary btn-block" value="Zarejestruj" onClick="sprawdzenie();">Zarejestruj</button>
    </form>
</main>
<?php
$web->ShowStopka()
?>