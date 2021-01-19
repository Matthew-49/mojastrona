<?php

session_start();

include 'Partials/Partials.php';
$web = new Webpage;
$web->ShowHeader();

    if(isset($_SESSION['username']) || $_SESSION['role'] == 'admin'){
        echo '
            <h3 style="text-align: center">Admin kontakt panel</h3>
            
            <div class="container-fluid">';
            include("./Credentials/polacz.php");
            $con = new mysqli($host, $username, $password, $dbName);
            $connection = $con->query("SELECT * FROM contactData");
            $Amount = $con->affected_rows;
            if ($Amount > 0){
                echo '<table>
                    <tr style="border-bottom: 2px solid black">
                        <th>Nazwa</th>
                        <th>Email</th>
                        <th>Temat</th>
                        <th>Pytanie</th>
                        <th>Odpowiedziany?</th>
                    </tr>';

            while($data = $connection->fetch_assoc()) {
                echo '<tr id="'. $data["id"] .'">';
                echo "<th>" . $data["name"] . "</th><th>" . $data["email"] . "</th><th>" . $data["topic"] . "</th><th>" . $data["data"] . "</th><th class='" . $data["answered"] . "'>" . $data["answered"] . "</th>";
                echo '</tr>';
            }

            $con->close();
        echo '</table>';
        } else {
            echo "<h2 style='text-align: center'>Odpowiedziano na wszystkie zapytania</h2>";
        }
     echo '</div>';
    } else {
    include("./Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);

    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }
    echo '
    <div class="container col-2">
        <h3 style="text-align: center">Kontakt</h3>
        <div class="ErrorDiv">';

            if(isset($_SESSION['kontakt'])){
                echo $_SESSION['kontakt'];
                unset($_SESSION['kontakt']);
            }

        echo '</div>
        <form action="Contact/sendContact.php" method="post" class="FormData">

            <label for="name">Imię</label>
            <input type="text" name="name" id="name">

            <label for="email">email</label>
            <input type="email" name="email" id="email">

            <label for="topic">Temat</label>
            <input type="text" name="topic" id="topic">

            <label for="question">Zapytanie</label>
            <textarea type="text" name="question" id="question" rows="4" cols="50"></textarea>

            <button class="btn btn-lg btn-primary btn-sm" type="submit">Wyślij</button>
        </form>
    </div>';
        }

    $web->ShowStopka();