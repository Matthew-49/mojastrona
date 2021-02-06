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
    <h3 style="text-align: center">Koszyk</h3>
    <div class="container">
        <?php
            $userId = $_SESSION['id'];
            $connection = $con->query("SELECT id, name, amount, price FROM koszyk where userid = $userId");
            $Amount = $con->affected_rows;
            if ($Amount > 0){
        ?>
            <div class="cards">
            <?php
            while($data = $connection->fetch_assoc()) {
                echo '
                    <div class="card" style={height:15rem}>
                        <div class="card-body">
                            <h5 class="card-title">' . $data["name"] . '</h5>
                            <h5 class="card-subtitle mb-2">Ilość: ' . $data["amount"] . '</h5>
                            <h5 class="card-subtitle mb-2">Cena: ' . $data["price"] . ' PLN</h5>
                            <h5 class="card-subtitle mb-2">Podsumowanie: ' . $data["amount"] * $data['price'] . ' PLN</h5>
                            <form action="./DatabaseEdits/RemoveBasket.php" method="POST">
                                <input type="text" name="id" value="'. $data["id"] .'" style="display: none">
                                <input type="text" name="basket" value="remove" style="display: none">
                                <button>remove</button>
                            </form>
                        </div>
                    </div>
                    ';
            }

            $con->close();
            ?>
            </div>
        <div style="text-align: center">
            <form action="./DatabaseEdits/SubmitBasket.php" method="POST">
                <input type="text" name="basket" value="Dodaj" style="display: none">
                <button>Potwierdź koszyk</button>
            </form>
        </div>
        <?php
            } else {
                echo "<h2 style='text-align: center'>Twój koszyk jest pusty</h2>";
            }
        ?>
    </div>
<?php

$web->ShowStopka();

?>