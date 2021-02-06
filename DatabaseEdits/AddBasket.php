<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

if(!isset($_POST['basket'])){
    header("location: ../index.php");
} else {

    if(isset($_POST['amount']) && isset($_POST['id']) && isset($_POST['basket']) && isset($_POST['nazwa'])){
        AddToBasket();
    } else {
        header("location: ../koszyk.php");
    }
}

function AddToBasket() {
    echo "Not added to basket";
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);
    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }

    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $name = $_POST['nazwa'];
    $userId = $_SESSION['id'];
    $cena = $_POST['price'];

    $con->query("INSERT INTO `koszyk` VALUES (null, '$name', '$id', '$amount', '$userId', '$cena')");

    if($con->affected_rows != "-1"){
        $con->close();
        header("location: ../koszyk.php");
    } else {
        $con->close();
        header("location: ../koszyk.php");
    }
}