<?php

session_start();

if(isset($_SESSION['username'])){
    header("location: index.php");
}

include 'Partials/Partials.php';
$web = new Webpage;
$web->ShowHeader();

?>
    <div class="container">
    <h2 class="text-center">Logowanie</h2>
        <?
        if(isset($_SESSION['LoginDone'])){
            echo "Rejestracja udana. Zaloguj się by używać konta";
        }
        ?>
        <form action="Credentials/login.php" method="post" class="FormData">
            <div class="ErrorDiv">
                <?
                    if(isset($_SESSION['login'])) echo$_SESSION['login'];
                ?>
            </div>
            <label for="login">Login</label>
            <input type="text" name="login">

            <label for="password">Hasło</label>
            <input type="password" name="password">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
        </form>
    </div>
<?php
$web->ShowStopka();

if(isset($_SESSION['login'])) unset($_SESSION['login']);
if(isset($_SESSION['LoginDone'])) unset($_SESSION['LoginDone']);

?>