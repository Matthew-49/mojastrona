<?php

    session_start();

    include 'Partials/Partials.php';
    $web = new Webpage;
    $web->ShowHeader();

include("./Credentials/polacz.php");
$con = new mysqli($host, $username, $password, $dbName);

if(!$con) {
    die('Błąd połączenia: '.mysqli_connect_error());
}
?>
    <h3 style="text-align: center">Zamównienia</h3>
    <div class="container">
        <table>
            <?
            $connection = $con->query("SELECT * FROM produkt");

            while($data = $connection->fetch_assoc()) {
                echo '<tr>';
                echo '<th>' . $data["id"] . "</th><th>" . $data["nazwa"] . "</th><th>" . $data["rozmiar"] . "</th><th>" . $data["producent"] . "</th><th>" . $data["dostepnosc"] . "</th><th>" . $data["cena"] . "</th><th>" . $data["typ"] . "</th><th>" . $data["opis"] . "</th>";
                echo '</tr>';
            }

            $con->close();
            ?>
        </table>
    </div>
<?php

$web->ShowStopka();

?>

Sprawdź ile jest na magazynie = funkcja z poziomu zamówień
