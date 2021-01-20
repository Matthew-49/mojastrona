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
        <?
            $userId = $_SESSION['id'];
            $connection = $con->query("SELECT id, name, amount FROM koszyk where userid = $userId");
            $Amount = $con->affected_rows;
            if ($Amount > 0){
        ?>
        <table>
            <tr style="border-bottom: 2px solid black">
                <th>Nazwa</th>
                <th>Ilość</th>
            </tr>
            <?
            while($data = $connection->fetch_assoc()) {
                echo '<tr id="'. $data["id"] .'">';
                echo "<th>" . $data["name"] . "</th><th>" . $data["amount"] . "</th>";
                echo '</tr>';
            }

            $con->close();
            ?>
        </table>
        <?
            } else {
                echo "<h2 style='text-align: center'>Twój koszyk jest pusty</h2>";
            }
        ?>
    </div>
<?php

$web->ShowStopka();

?>