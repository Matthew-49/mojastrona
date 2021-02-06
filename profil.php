<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: index.php");
}

include 'Partials/Partials.php';
$web = new Webpage;
$web->ShowHeader();

include("./Credentials/polacz.php");
$con = new mysqli($host, $username, $password, $dbName);

if(!$con) {
    die('Błąd połączenia: '.mysqli_connect_error());
}
?>
<h3 style="text-align: center">Profil użytkownika</h3>
<div class="container">
    <?php
    if(!isset($_POST['edit'])) {
    ?>
        <?php
            if($_SESSION['role'] == "admin"){
                $connection = $con->query("SELECT * FROM zamowieniaAddons");
                $Amount = $con->affected_rows;
            } else {
                $userId = $_SESSION['id'];
                $connection = $con->query("SELECT * FROM zamowieniaAddons where userid = $userId");
                $Amount = $con->affected_rows;
            }
        if ($Amount > 0){
            ?>
            <div class="cards">
                <?php
                while($data = $connection->fetch_assoc()) {
                    echo '
                            <div class="card" style={height:18rem}>
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">Miejscowość ' . $data["miejscowosc"] . '</h5>
                                    <h5 class="card-subtitle mb-2" style="text-align: center">Ulica: ' . $data["street"] . '</h5>
                                    <h5 class="card-subtitle mb-2" style="text-align: center">Numer: ' . $data["buildingnumber"] . '</h5>
                                    <h5 class="card-subtitle mb-2" style="text-align: center">Kod Pocztowy: ' . $data["postcode"] . '</h5>
                                </div>
                            </div>
                            ';
                }
                echo '</div>';
                $con->close();
                } else {
                    echo '<h3 style="text-align: center">Wygląda na to, że nie podałeś żadnych danych odnośnie swojego adresu dostawy</h3>';
                }
                ?>
            <center><form method='POST' action='profil.php'><input type='text' name='edit' value='edit' style='display: none'><button>Edytuj</button></form></center>
            <?php
    } else {
        echo '
        <form action="Credentials/UpdateUserCredentials.php" method="post" class="FormData">
        
        <label for="miejscowosc">Miejscowość</label>
        <input type="text" name="miejscowosc" placeholder="Miejscowość" value="" required>        
        
        <label for="street">Ulica</label>
        <input type="text" name="street" placeholder="Ulica" value="" required>       
         
        <label for="buildingnumber">Numer budynku</label>
        <input type="number" name="buildingnumber" placeholder="Numer budynku" value="" required>
        
        <label for="postcode">Kod pocztowy</label>
        <input type="text" name="postcode" placeholder="Kod pocztowy" value="" required>

        <button class="btn btn-lg btn-primary btn-block" value="Zarejestruj">Edytuj</button>
    </form>';
    }
    ?>
</div>


<?php

$web->ShowStopka();

?>