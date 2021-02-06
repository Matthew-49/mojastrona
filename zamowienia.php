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
        <?php
        if($_SESSION['role'] == "admin"){
            $id = $_SESSION['id'];
            $connection = $con->query("SELECT * FROM zamowienia");
            $Amount = $con->affected_rows;
            if ($Amount > 0){ ?>
                <div class="cards">
                    <?php while($data = $connection->fetch_assoc()) {
                        echo '
                            <div class="card" style={height:15rem}>
                                <div class="card-body">
                                    <h5 class="card-title">' . $data["nazwa"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["ilosc"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["cena"] . '</h5>
                                    <h5 class="card-subtitle mb-2">' . $data["userid"] . '</h5>
                                </div>
                            </div>
                            ';
                    }
                    $con->close();
                    ?>
                </div>
                <?php
            } else {
                echo "<h2 style='text-align: center'>Wygląda na to, że nie złożyłeś żadnego zamówienia, złóż jakieś by sprawdzić tutaj jego status</h2>";
            }
        } else {
            $id = $_SESSION['id'];
            $connection = $con->query("SELECT * FROM zamowienia where userid = $id");
            $Amount = $con->affected_rows;
            if ($Amount > 0){ ?>
                <div class="cards">
                    <?php while($data = $connection->fetch_assoc()) {
                        echo '
                            <div class="card" style={height:15rem}>
                                <div class="card-body">
                                    <h5 class="card-title">' . $data["nazwa"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Ilość: ' . $data["ilosc"] . '</h5>
                                    <h5 class="card-subtitle mb-2">Cena: ' . $data["cena"] . '</h5>
                                </div>
                            </div>
                            ';
                    }

                    $con->close();
                    ?>
                </div>
                <?php
            } else {
                echo "<h2 style='text-align: center'>Wygląda na to, że nie złożyłeś żadnego zamówienia, złóż jakieś by sprawdzić tutaj jego status</h2>";
            }
        }
        ?>
    </div>
<?php

$web->ShowStopka();

?>