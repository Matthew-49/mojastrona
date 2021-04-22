<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
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
    <h3 style="text-align: center">Edycja produktów</h3>
    <div class="container">
    <center>
        <button onclick="location.href='dodajprodukty.php'">Dodaj nowy produkt</button>
    </center>
        <?php
        if(isset($_SESSION['DataFromProducts']) && $_SESSION['Options'] == "edit"){
            unset($_SESSION['DataFromProducts']);
            $id =  $_SESSION['IdFromProducts'];
            unset($_SESSION['IdFromProducts']);
            unset($_SESSION['Options']);

            $connection = $con->query("SELECT * FROM produkt where id = $id");
            $Amount = $con->affected_rows;
            if ($Amount > 0){
                while($data = $connection->fetch_assoc()) {
                    echo '
                <form action="DatabaseEdits/ManageProduct.php" method="POST" class="FormData">

                    <input type="text" name="id" value="'. $data["id"] .'" style="display: none">
                    <input type="text" name="edit" value="editData" style="display: none">

                    <label for="nazwa">Nazwa</label>
                    <input type="text" name="nazwa" value="'. $data['nazwa'] .'">

                    <label for="rozmiar">Rozmiar</label>
                    <input type="text" name="rozmiar" value="'. $data['rozmiar'] .'">

                    <label for="producent">Producent</label>
                    <input type="text" name="producent" value="'. $data['producent'] .'">

                    <label for="dostepnosc">Dostępność</label>
                    <input type="number" name="dostepnosc" value="'. $data['dostepnosc'] .'">

                    <label for="cena">Cena</label>
                    <input type="number" name="cena" value="'. $data['cena'] .'">

                    <label for="typ">Typ</label>
                    <input type="text" name="typ" value="'. $data['typ'] .'">

                    <label for="opis">Opis</label>
                    <input type="text" name="opis" value="'. $data['opis'] .'">
                    
                    <input type="submit" value="Edytuj">
                </form>
                        ';
                }
            } else {
                echo "<h2 style='text-align: center'>Wygląda na to, że nie posiadamy aktualnie żadnych produktów w sprzedaży</h2>";
            }
        } else {
            if(isset($_SESSION['EditSuccess'])){
                echo $_SESSION['EditSuccess'];
                unset($_SESSION['EditSuccess']);
            }
            $connection = $con->query("SELECT * FROM produkt");
            $Amount = $con->affected_rows;
            if ($Amount > 0){?>
                <table>
                    <tr style="border-bottom: 2px solid black">
                        <th>Usuń</th>
                        <th>Edycja</th>
                        <th>Nazwa</th>
                        <th>Rozmiar</th>
                        <th>Producent</th>
                        <th>Dostępność</th>
                        <th>Cena</th>
                        <th>Typ</th>
                        <th>Opis</th>
                    </tr>
                    <?php
                    while($data = $connection->fetch_assoc()) {
                        echo "
                        <tr id='". $data["id"] ."'>
                             <form action='DatabaseEdits/RemoveProduct.php' method='POST'>
                                <th>
                                    <button style='float: left'>Usuń</button>
                                </th>
                                <input type='text' name='id' value='". $data['id'] ."' style='display: none'>
                            </form>
                            <form action='DatabaseEdits/ManageProduct.php' method='POST'>
                                <th>
                                    <button style='float: left'>Edytuj</button>
                                </th>
                                <th>
                                    <input type='text' name='id' value='". $data['id'] ."' style='display: none'>
                                    <input type='text' name='edit' value='edit' style='display: none'>
                                    <input type='submit' value='". $data['nazwa'] ."' style='background: none; border: none; font-size: larger'>
                                </th>
                            </form>
                            <th>". $data['rozmiar'] ."</th>
                            <th>". $data['producent'] ."</th>
                            <th>". $data['dostepnosc'] ."</th>
                            <th>". $data['cena'] ."</th>
                            <th>". $data['typ'] ."</th>
                            <th>". $data['opis'] ."</th>
                        </tr>";
                    }
                    $con->close();
                    ?>
                </table>
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