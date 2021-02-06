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
    <h3 style="text-align: center">Lista produktów</h3>
    <div class="container">
        <?php
        if($_SESSION['role'] == "admin"){
            $connection = $con->query("SELECT * FROM produkt");
            $Amount = $con->affected_rows;
            if ($Amount > 0){

                ?>
                <div class="cards">
                    <?php
                    while($data = $connection->fetch_assoc()) {
                        echo '
                            <div class="card" style={height:15rem}>
                                <div class="card-body">
                                    <h5 class="card-title">' . $data["nazwa"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["rozmiar"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["producent"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["dostepnosc"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["cena"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["typ"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["opis"] . '</h5>
                                </div>
                            </div>
                            ';
                    }

                    $con->close();
                    ?>
                </div>
                <?php
            } else {
                echo "<h2 style='text-align: center'>Wygląda na to, że nie posiadamy aktualnie żadnych produktów w sprzedaży</h2>";
            }
        } else {
            $connection = $con->query("SELECT * FROM produkt where dostepnosc > 0");
            $Amount = $con->affected_rows;
            if ($Amount > 0){

                ?>
                        <div class="cards">
                    <?php
                    while($data = $connection->fetch_assoc()) {
                        echo '
                            <div class="card" style={height:16rem}>
                                <div class="card-body">
                                    <h5 class="card-title">' . $data["nazwa"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Rozmiar: ' . $data["rozmiar"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Producent: ' . $data["producent"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Dostępność: ' . $data["dostepnosc"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Cena: ' . $data["cena"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Typ: ' . $data["typ"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Opis: ' . $data["opis"] . '</h5>
                                    <hr>
                                    <form action="./DatabaseEdits/AddBasket.php" method="POST">
                                        <h5 class="card-subtitle mb-2">Ilość</h5>
                                        <input type="number" name="amount">
                                        <input type="text" name="basket" value="add" style="display: none">
                                        <input type="text" name="id" value="' . $data["id"]. '" style="display: none">
                                        <input type="text" name="nazwa" value="' . $data["nazwa"] . '" style="display: none">
                                        <input type="text" name="price" value="'. $data["cena"] .'" style="display: none">
                                        <input type="submit" value="Zamów">
                                    </form>
                                </div>
                            </div>
                            ';
                    }
                    $con->close();
                    ?>
                        </div>
                <?php
            } else {
                echo "<h2 style='text-align: center'>Wygląda na to, że nie posiadamy aktualnie żadnych produktów w sprzedaży</h2>";
            }
        }
            ?>
    </div>
<?php

$web->ShowStopka();

?>