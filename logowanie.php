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
    <h2 class="text-center">Logowanie</h2>
			<form name = "formularz2"
				action = "logowaniesc.php"
				method = "post">
			
                <div class="form-group">
				<input type="text" name="login" placeholder="   Login">
                </div>
                
				<div class="form-group">
				<input type="password" name="haslo" placeholder="   Hasło">
                </div>

            <button class="btn btn-lg btn-primary btn-block"value="Zalogój" type="submit">Zaloguj</button>
			</form>
    </main>
<?php
$web->ShowStopka()
?>