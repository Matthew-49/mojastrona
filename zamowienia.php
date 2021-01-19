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
    <div class="container">
        <table>
            <tr>
                <th>Company</th>
                <th>Contact</th>
                <th>Country</th>
            </tr>
        </table>
    </div>
<?php

$web->ShowStopka();

?>