<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

if($_POST['basket'] != "Dodaj"){
    header("location: ../index.php");
} else {
    SubmitBasket();
}

function SubmitBasket() {
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);
    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }

    $userid = $_SESSION['id'];

    $connection = $con->query("SELECT * FROM koszyk WHERE userid = $userid");
    while($data = $connection->fetch_assoc()) {
        $id = $data['id'];
        $name = $data['name'];
        $productid = $data['productid'];
        $amount = $data['amount'];
        $price = $data['price'];
        $userid = $data['userid'];

        $TakeProduct = $con->query("SELECT id, dostepnosc FROM `produkt` where id = $productid");
        while($data2 = $TakeProduct->fetch_assoc()) {
            $Fullid = $data2['id'];
            $FullAmount = $data2['dostepnosc'] - $amount;
            $con->query("UPDATE `produkt` SET `dostepnosc` = '$FullAmount' WHERE `id` = $Fullid");
        }
        $con->query("INSERT INTO `zamowienia` VALUES ($id, '$name', '$amount', $price, $userid, $productid, CURDATE() )");
        $con->query("DELETE FROM `koszyk` WHERE id = $id");
    }

    if($con->affected_rows != "-1"){
        $con->close();
        header("location: ../zamowienia.php");
    } else {
        $con->close();
        header("location: ../koszyk.php");
    }
}