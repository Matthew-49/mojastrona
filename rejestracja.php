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
    <h2 class="text-center">Formularz rejestracyjny</h2>
    <form action="Credentials/register.php" method="post" class="FormData">
            <div class="ErrorDiv">
                <?
                    if(isset($_SESSION['email'])) echo$_SESSION['email'];
                ?>
            </div>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" value="<? if($_SESSION["emailData"]){ echo $_SESSION["emailData"];} ?>" required>
            <div class="ErrorDiv">
                <?
                    if(isset($_SESSION['login'])) echo$_SESSION['login'];
                ?>
            </div>
        <label for="login">Login</label>
        <input type="text" name="login" placeholder="Login" value="<? if($_SESSION["loginData"]){ echo $_SESSION["loginData"];} ?>" required>
            <div class="ErrorDiv">
                <?
                    if(isset($_SESSION['password'])) echo$_SESSION['password'];
                ?>
            </div>
        <label for="password">Hasło</label>
        <input type="password" name="password" placeholder="Hasło" required>

        <label for="password2">Powtórz hasło</label>
        <input type="password" name="password2" required>

        <button class="btn btn-lg btn-primary btn-block" value="Zarejestruj">Zarejestruj</button>
    </form>
</div>

<?php

if(isset($_SESSION['email'])) unset($_SESSION['email']);
if(isset($_SESSION['login'])) unset($_SESSION['login']);
if(isset($_SESSION['password'])) unset($_SESSION['password']);
if(isset($_SESSION["emailData"])) unset($_SESSION["emailData"]);
if(isset($_SESSION["loginData"])) unset($_SESSION["loginData"]);

$web->ShowStopka()
?>