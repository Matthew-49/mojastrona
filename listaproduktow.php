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
        <?
            $connection = $con->query("SELECT * FROM produkt where dostepnosc > 0");

            $Amount = $con->affected_rows;
        if ($Amount > 0){

        ?>
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
            while($data = $connection->fetch_assoc()) {
                echo '<tr id="'. $data["id"] .'">';
                echo "<th>" . $data["nazwa"] . "</th><th>" . $data["rozmiar"] . "</th><th>" . $data["producent"] . "</th><th>" . $data["dostepnosc"] . "</th><th>" . $data["cena"] . "</th><th>" . $data["typ"] . "</th><th>" . $data["opis"] . "</th>";
                echo '</tr>';
            }

            $con->close();
            ?>
        </table>
            <?
        } else {
            echo "<h2 style='text-align: center'>Wygląda na to, że nie posiadamy aktualnie żadnych produktów w sprzedaży</h2>";
        }
            ?>
    </div>
<?php

$web->ShowStopka();

?>