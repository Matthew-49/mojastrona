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
    <h3 style="text-align: center">Lista produktów</h3>
    <div class="container">
        <table>
            <tr style="border-bottom: 2px solid black">
                <th>Nazwa</th>
                <th>Rozmiar</th>
                <th>Producent</th>
                <th>Dostępność</th>
                <th>Cena</th>
                <th>Typ</th>
                <th>Opis</th>
            </tr>
            <?
            $connection = $con->query("SELECT * FROM produkt");

            while($data = $connection->fetch_assoc()) {
                echo '<tr id="'. $data["id"] .'">';
                echo "<th>" . $data["nazwa"] . "</th><th>" . $data["rozmiar"] . "</th><th>" . $data["producent"] . "</th><th>" . $data["dostepnosc"] . "</th><th>" . $data["cena"] . "</th><th>" . $data["typ"] . "</th><th>" . $data["opis"] . "</th>";
                echo '</tr>';
            }

            $con->close();
            ?>
        </table>
    </div>
<?php

$web->ShowStopka();

?>