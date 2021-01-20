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
    <h3 style="text-align: center">Zamównienia</h3>
    <div class="container">
        <?
        $id = $_SESSION['id'];
        $connection = $con->query("SELECT * FROM zamowienia where userid = $id");
        $Amount = $con->affected_rows;
        if ($Amount > 0){ ?>
    <table>
        <tr>
            <th>Nazwa</th>
            <th>Ilość</th>
            <th>Cena</th>
        </tr>
        <? while($data = $connection->fetch_assoc()) {
            echo '<tr id="'. $data["id"] .'">';
            echo "<th>" . $data["nazwa"] . "</th><th>" . $data["ilosc"] . "</th><th>" . $data["cena"] . "</th>";
            echo '</tr>';
        }

        $con->close();
        ?>
    </table>
        <?
        } else {
            echo "<h2 style='text-align: center'>Wygląda na to, że nie złożyłeś żadnego zamówienia, złóż jakieś by sprawdzić tutaj jego status</h2>";
        }
        ?>
    </div>
<?php

$web->ShowStopka();

?>

<!--TODO-->
<!--Zamówienie 1 = kasuj dane z magazynu-->