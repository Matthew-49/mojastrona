<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

if(!isset($_POST['basket'])){
    header("location: ../index.php");
} else {

    if(isset($_POST['id']) && $_POST['basket'] == "remove"){
        RemoveFromBasket();
    } else {
        header("location: ../koszyk.php");
    }
}

function RemoveFromBasket() {
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);
    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }

    $id = $_POST['id'];

    $con->query("DELETE FROM `koszyk` WHERE id = $id");

    if($con->affected_rows != "-1"){
        $con->close();
        header("location: ../koszyk.php");
    } else {
        $con->close();
        header("location: ../koszyk.php");
    }
}